<?php

namespace App\Http\Controllers\Admin;

use App\Collections\OrdersCollection;
use App\Collections\OrdersProductsCollection;
use App\Collections\ReturnedCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\OutboundRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Requests\UpdateOrdersProductsRequest;
use App\Http\Resources\OrderProductsResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ReturnedsResource;
use App\Models\CanceledOrder;
use App\Models\Driver;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Reason;
use App\Services\OrderServices;
use App\Services\NotificationServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Vendor;
use App\Services\Delivery\Dotman;
use App\Services\Payments\Thawani;
use Exception;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        if (Auth::user() != null && Auth::user()->userable_type == 'App\Models\Admin') {
            $orders = OrdersCollection::collection($request);
            }else{
                $vendor =  Vendor::where('id',auth()->user()->userable->id)->first();
                $perPage = $request->limit  ? $request->limit : 10;
                $ordersProduct  = OrderProduct::where('shop_id', $vendor->shop->id)
                ->with('product','order')
                ->distinct('order_id')
        
                ->pluck('order_id');
                
                $orders = Order::whereIn('id',$ordersProduct)->orderBy('created_at', 'desc')->paginate($perPage);
            }
            return view('panel.orders.index', compact('orders'));
    }

    public function inbound(Request $request)
    {
        $orders =OrderProductsResource::collection(OrdersProductsCollection::collection($request));
        return view('panel.orders.inbound', compact(['orders']));
    } 

    public function inboundedit($id)
    {
        $order = OrderProduct::findorfail($id);
        $drivers = Driver::pluck('name', 'id');
        $statuses = ['pending', 'taken', 'delivered', 'packaging','canceled', 'returned'];
        return view('panel.orders.inboundedit', compact(['order', 'drivers','statuses']));
    } 

    public function inboundstatus(UpdateOrdersProductsRequest $request, $id)
    {

        $product = OrderProduct::findorfail($id);
        $product->update($request->validated());
        return redirect()->route('admin.orders.inbound');
    } 

    public function outboundstatus(Request $request, $id)
    {
        
        return view('panel.orders.inbound', compact('orders'));
    } 


    public function outbound(Request $request)
    {
        $perPage = $request->limit  ? $request->limit : 10;
        $orders = Order::where('delivered_by', '!=', null)->with('products')->orderBy('created_at', 'desc')->paginate($perPage);
        return view('panel.orders.outbound', compact('orders'));
    }

    public function scheduled(Request $request)
    {
        $perPage = $request->limit  ? $request->limit : 10;
        $orders = Order::where('delivered_by', '!=', null)->where('status', 'On-hold')->with('products')->orderBy('created_at', 'desc')->paginate($perPage);
        return view('panel.orders.scheduled', compact('orders'));
    }

    public function approved(Order $order)
    {
        $order->update(['approved' => 1]);
        return redirect()->back();
    }

    public function canceled(Request $request)
    {
        $perPage = $request->limit  ? $request->limit : 10;
        $orders = Order::where('status', 'canceled')->with('products')->orderBy('created_at', 'desc')->paginate($perPage);
        return view('panel.orders.canceled', compact('orders'));
    }

    public function cancel(Order $order)
    {
        if($order->status == 'in progress')
        {
            return response(['message' => __('your order has already been picked up')]);
        }else{
            $order->update(['status'=>'canceled']);
            $canceled_order_products = OrderProduct::where('order_id', $order->id)->get();
            if ($order->status == 'canceled') {
                $delivery_order = new Dotman(config('services.product_delivery.api'));
                $cancel_delivery = $delivery_order->cancelOrder($order->delivery_ref_id);
                foreach ($canceled_order_products as $product) {
                    $product->update(['status' => 'canceled']);
                }
            }
            return redirect()->back();
        }
    }


    public function sendtoDelivery(Order $order){
        $payment = Payment::where(['order_id' => $order->id, 'user_id' =>  $order->customer->user->id])->first();
        $session_id = $payment->reference_id;
        if (!$payment) {
            abort(404);
        }
        $client = new Thawani(
            config('services.thawani.secret_key'),
            config('services.thawani.publishable_key'),
            'test'
        );
        $response = $client->getCheckoutSession($session_id);
        try {
            $delivery_order = new Dotman(config('services.product_delivery.api'));
                    if ($order->payment_method == 'online'){
                        $data = [
                            "name" => $order->customer->name,
                            "phone" => $order->customer->user->phone,
                            "region_id" => $order->region_id,
                            "address" => $order->address,
                            "cod" => 0,
                            "ecom_ref_no" => "refnofromcom"
                        ];
                        $delivery_order = $delivery_order->createOrder($data);
                        // update order delivery ref id for the api 
                        $order = Order::findOrFail($order->id);
                        $order->update([
                            'delivery_ref_id' => $delivery_order['data']['ref_no']
                        ]);
                        $payment->status = 'success';
                        $payment->data = $response;
                        $payment->save();
                    }else{

                        if($order->payment_method == 'cash'){
                            $data = [
                                "name" => $order->customer->name,
                                "phone" => $order->customer->user->phone,
                                "region_id" => $order->region_id,
                                "address" => $order->address,
                                "cod" => $order->total,
                                "ecom_ref_no" => "refnofromcom"
                            ];
    
                        }elseif($order->payment_method == 'bank'){
                            $data = [
                                "name" => $order->customer->name,
                                "phone" => $order->customer->user->phone,
                                "region_id" => $order->region_id,
                                "address" => $order->address,
                                "cod" => 0,
                                "ecom_ref_no" => "refnofromcom"
                            ];
                        }
                        
                        $delivery_order = $delivery_order->createOrder($data);
                        // update order delivery ref id for the api 
                        $order->update([
                            'delivery_ref_id' => $delivery_order['data']['ref_no']
                        ]);
                    }

    
                    return redirect()->back();
            } catch (Exception $e) {
                dd($e->getMessage());
            }
        
        }

    public function returned(Request $request)
    {
        $products = ReturnedsResource::collection(ReturnedCollection::collection($request));
        // dd($products->first()->product->first);
        return view('panel.orders.returned', compact('products'));
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
        $order =  DB::transaction(function () use ($request) {
            $order = Order::create(array_merge(['customer_id' => auth()->user()->userable->id], $request->validated()));
            OrderServices::products($request->products, $order);
            
                foreach($request->products as $product )
                {
                    $prod = Product::where('id' , $product)->first();
                    $user_id = $prod->shop->vendor->user->id;
                    // return dd($user_id);
                    $device_token = User::whereNotNull('fcm_token')->where('id',$user_id)->pluck('fcm_token')->all();

                    $message = [
                        'title' => "New Order",
                        'body' => "you have a new order!",
                    ];
    
                    // if($device_token){
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
                    // }
                }
                
                return $order;
       });
       return new OrderResource($order);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return OrderResource
     */
    public function show(Order $order) {
        $delivery_order = new Dotman(config('services.product_delivery.api'));
        $delivery = $delivery_order->retrieveOrder($order->delivery_ref_id);
        $reasons = Reason::orderBy('id', 'desc')->get();
        return view('panel.orders.show')
            ->with([
                'order' => $order,
                'reasons' => $reasons,
                'delivery' => $delivery
            ]);
    }

    public function print(Order $order) {
        $delivery_order = new Dotman(config('services.product_delivery.api'));
        $delivery = $delivery_order->retrieveOrder($order->delivery_ref_id);
        $reasons = Reason::orderBy('id', 'desc')->get();
        $date = now();
        $barcode = (string)$order->id;
        return view('panel.orders.recipt')
            ->with([
                'order' => $order,
                'reasons' => $reasons,
                'date' => $date,
                'barcode' => $barcode,
                'delivery' => $delivery
            ]);
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
    public function statusupdate(OutboundRequest $request,$id)
    {
        $order = Order::findorfail($id);
        $order_products = OrderProduct::where('order_id', $id)->where('status', 'packaging')->get();
        if ($request->status == 'completed') {
            foreach($order_products as $product){
                $product->update(['status'=>'delivered']);
            }
            $order->delivered_at = Carbon::now();
            $order->update($request->validated());
        }else{
            $order->update($request->validated());
        }
        return redirect()->back();

    }


}
