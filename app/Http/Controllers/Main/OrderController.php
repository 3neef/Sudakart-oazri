<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Payment;
use App\Services\Delivery\Dotman;
use App\Services\OrderServices;
use App\Services\Payments\Thawani;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Services\NotificationServices;
use App\Models\Product;
use App\Models\User;
use App\Models\CanceledOrder;
use App\Models\OrderProduct;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        // get payment client
        $client = new Thawani(config('services.thawani.secret_key'), config('services.thawani.publishable_key'), 'test');
        $order = new Order();
        if (Cart::content()->count() == 0) {
            return redirect()->route('cart.index');;
        }
        $cart = Cart::content();
        $products = [];
        foreach ($cart as $product) {
            $options = [];
            if ($product->options->count() > 0) {
                foreach ($product->options as $op) {
                    $options[] =  ['product_option_id' => $op['product_option_id'] ] ;
                }
                
            } else {
                $options = [];
            }
            array_push($products, [
                'product_id' => $product->id,
                'quantity' => $product->qty,
                'coupon_id' => $request->coupon_id,
                'options' =>  $options
            ]);
        }

        

        DB::beginTransaction();
        try {
            $order->customer_id = Auth::guard('web')->user()->id;
            $order->delivery_amount = $request->shipping_cost;
            $order->payment_method = $request->payment_method;
            $order->address = $request->address;
            $order->region_id = $request->region_id;
            $order->save();

            OrderServices::products($products, $order);
            Cart::destroy();
            $data = [
                'client_reference_id' => 'order-' . $order->id,
                'mode' => 'payment',
                'products' => [
                    [
                        'name' => 'order-' . $order->id,
                        'unit_amount' => 1 * $order->total,
                        'quantity' => 1,
                    ],
                ],
                'success_url' => route('checkout.payment.complete'),
                'cancel_url' => route('checkout.payment.cancel'),
            ];
            DB::commit();

            foreach($products as $product )
            {
                $prod = Product::where('id' , $product['product_id'])->first();
                $user_id = $prod->shop->vendor->user->id;
                $device_token = User::whereNotNull('fcm_token')->where('id',$user_id)->pluck('fcm_token');
                // return dd($device_token);

                $message = [
                    'title' => "New Order",
                    'body' => "you have a new order!",
                ];

                if($device_token){
                    DB::table('notifications')->insert(
                        array(
                            'title' => 'New Order', 
                            'message' =>'you have a new order!',
                            'type'=> 'order', 
                            'item_id'=> $order->id,
                            'user_id'=> $user_id,
                            'created_at' => now()
                            )
                        );
                    NotificationServices::sendNotification($device_token, $message);
                }

            }

            try {
                if ($request->payment_method != 'online') {
                    // $delivery_order = new Dotman(config('services.product_delivery.api'));
                    // $data = [
                    //     "name" => Auth::guard('web')->user()->userable->name,
                    //     "phone" => Auth::guard('web')->user()->phone,
                    //     "region_id" => $order->region_id,
                    //     "address" => $order->address,
                    //     "cod" => $order->total,
                    //     "order_id" => $order->id,
                    //     "ecom_ref_no" => "refnofromcom"
                    // ];
                    // $delivery_order = $delivery_order->createOrder($data);
                    // // update order delivery ref id for the api 
                    // $order = Order::findOrFail($order->id);
                    // $order->update([
                    //     'delivery_ref_id' => $delivery_order['data']['ref_no']
                    // ]);
                    return redirect()->to(route('profile.myOrder'));
                } else {
                    $session_id = $client->createCheckoutSession($data);

                    $pay_url = "https://uatcheckout.thawani.om/pay/{$session_id}?key=" . config('services.thawani.publishable_key');
                    // make payment request
                    $payment = Payment::forceCreate([
                        'user_id' => Auth::guard('web')->user()->id,
                        'gateway' => 'thawani',
                        'reference_id' => $session_id,
                        'status' => 'pending',
                        'amount' => $order->total,
                        'order_id' => $order->id
                    ]);
                    Session::put('payment_id', $payment->id);
                    Session::put('session_id', $session_id);
                    return redirect()->away($pay_url);
               }
            } catch (Exception $e) {
                return $e;
            }

           return redirect()->route('cart.orderPlaced', $order->id);
           
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('cart.checkout');
        }
    }

   

    public function cancelOrder(Request $request , $id) {
        $order = Order::findOrFail($id);
        $canceled = CanceledOrder::create(['order_id' => $id]);
        $order->update(['status'=>'canceled']);
        $canceled_order_products = OrderProduct::where('order_id', $canceled->order_id)->get();
        if ($order->status == 'canceled') {
            foreach ($canceled_order_products as $product) {
                $product->update(['status' => 'canceled']);
            }
        }
        $ref_id = $order->delivery_ref_id;
        $dotman = new Dotman(config('services.product_delivery.api'));
        $delivery = $dotman->cancelOrder($ref_id);
        if($delivery['status']){
            $request->session()->flash('orderDeleted', __('msg.orderDeleted'));
        }else {
            $request->session()->flash('deletedFailed', __('msg.deletedFailed'));
        }

        return redirect()->route('profile.myOrder.orderDetails',$id);
    } 
}
