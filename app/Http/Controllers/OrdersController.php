<?php

namespace App\Http\Controllers;

use App\Collections\OrdersCollection;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\OutboundRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Driver;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use App\Models\Product;
use App\Services\OrderServices;
use App\Services\NotificationServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Vendor;
use App\Services\Delivery\Dotman;
use App\Services\Payments\Thawani;
use App\Services\SMSServices;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return OrdersCollection::collection($request);
    }
    public function customerOrder(Request $request)
    {
        $perPage = $request->limit  ? $request->limit : 50;
        $orders = Order::where('customer_id', auth()->user()->userable->id)->with('products')->orderBy('created_at', 'desc')->paginate($perPage);
        return $orders;
    }
    public function driverOrder(Request $request)
    {
        $perPage = $request->limit  ? $request->limit : 50;
        $orders = Order::where('delivered_by', auth()->user()->userable->id)->with('products')->orderBy('created_at', 'desc')->paginate($perPage);
        return $orders;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return OrderResource
     */
    public function store(CreateOrderRequest $request)
    {
        // $text = "Hello Ozari User";
        // $phone = [96893734317, 96895394954];
        // $test = SMSServices::sendsms($text,$phone);
        $order =  DB::transaction(function () use ($request) {
            $order = Order::create(array_merge(['customer_id' => auth()->user()->userable->id], $request->validated()));
            OrderServices::products($request->products, $order);
            $vendors = [];
            foreach($request->products as $product )
            {
                $prod = Product::where('id' , $product)->first();
                $vendors[] = $prod->shop->vendor->user->id;
            }
            
            $ids = array_unique($vendors);
            $users = User::whereIn('id', $ids)->get();
                $message = [
                    'title' => "New Order",
                    'body' => "you have a new order!",
                ];

                foreach ($users as $user) {
                    DB::table('notifications')->insert(
                        array(
                            'title' => 'New Order', 
                            'message' =>'you have a new order!',
                            'type'=> 'order', 
                            'item_id'=> $order->id,
                            'user_id'=> $user->id,
                            'created_at' => now()
                            )
                        );
                        if($user->fcm_token != null){
                        NotificationServices::sendNotification($user->fcm_token, $message);
                        }

                }
                if($order->payment_method == "online"){

                
                 //order payment
                    $data = [
                        'client_reference_id' => 'order-'.$order->id,
                        'mode' => 'payment',
                        'products' => [
                            [
                                'name' => 'order-'.$order->id,
                                'unit_amount' => 1 * round($order->total, 0, PHP_ROUND_HALF_UP),
                                'quantity' => 1,
                            ],
                        ],
                        'success_url' => route('api.payment.success', $order->id),
                        'cancel_url' => route('api.payment.cancel', $order->id),
                    ];
                    
                    try {
                        // get payment client
                        $client = new Thawani(config('services.thawani.secret_key'), config('services.thawani.publishable_key'), 'test');
                        $session_id = $client->createCheckoutSession($data);
                        
                        $pay_url = "https://uatcheckout.thawani.om/pay/{$session_id}?key=".config('services.thawani.publishable_key');
                        // make payment request
                        $payment = Payment::forceCreate([
                            'user_id' => Auth::guard('api')->user()->id,
                            'gateway' => 'thawani',
                            'reference_id' => $session_id,
                            'status' => 'pending',
                            'amount' => $order->total,
                            'order_id' => $order->id
                        ]);
                        Session::put('payment_id', $payment->id);
                        Session::put('session_id', $session_id);
                        // dd($pay_url);
                        return response()->json(array('payment_url' => $pay_url, 'order'=>$order));
                    } catch (Exception $e) {
                        return $e;
                    }
                }
                
                return $order;
            });
        return $order;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return OrderResource
     */
    public function show(Order $order) {
        return new OrderResource($order);
    }

    public function VendorOrder(Request $request) {
        $vendor =  Vendor::where('id',auth()->user()->userable->id)->first();
        $perPage = $request->limit  ? $request->limit : 50;
        $ordersProduct  = OrderProduct::where('shop_id', $vendor->shop->id)
        ->where('status', 'pending')
        ->with('product','order')
        ->distinct('order_id')

        ->pluck('order_id');
        
        $orders = Order::whereIn('id',$ordersProduct)->orderBy('created_at', 'desc')->get();
        return $orders; 
    }
    public function VendorOrderShow(Request $request, $orderId) {
        $vendor =  Vendor::where('id',auth()->user()->userable->id)->first();
        $perPage = $request->limit  ? $request->limit : 50;
        $ordersProduct  = OrderProduct::select(['product_id'])->where('order_id',$orderId)->where('shop_id', $vendor->shop->id)
        ->where('status', 'pending')
        ->with('product','options')
        ->paginate($perPage);
        return $ordersProduct; 
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateOrderRequest  $request
     * @param  int  $id
     * @return OrderResource
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        // $has_driver = Driver::findorfail();
        $order_products = OrderProduct::where('order_id', $order->id)->where('status', 'packaging')->get();
        if($request->delivered_by != null){
            $order->update(['status'=>'out for delivery']);
            foreach($order_products as $product){
                $product->update(['driver_id'=>$request->delivered_by]);
            }
            $order->update($request->validated());
        }else{
            $order->update($request->validated());
        }
        return new OrderResource($order);
    }
    public function Outboundupdate(OutboundRequest $request,$id)
    {
        $order = Order::findorfail($id);
        $order_products = OrderProduct::where('order_id', $id)->where('status', 'packaging')->get();
        if ($request->status == 'delivered') {
            foreach($order_products as $product){
                $product->update(['status'=>'delivered']);
            }
            $order->delivered_at = Carbon::now();
            $order->update($request->validated());
        }else{
            $order->update($request->validated());
        }
        return $order;

    }

}
