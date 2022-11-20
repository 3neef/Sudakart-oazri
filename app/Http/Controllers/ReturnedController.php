<?php

namespace App\Http\Controllers;

use App\Collections\ReturnedCollection;
use App\Http\Requests\CreateReturningRequest;
use App\Http\Requests\UpdateReturningRequest;
use App\Http\Resources\ReturnedsResource;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\ReturnedProducts;
use App\Services\Delivery\Dotman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReturnedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return ReturnedsResource::collection(ReturnedCollection::collection($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateReturningRequest  $request
     * @return ReturnedsResource
     */
    public function store(CreateReturningRequest $request)
    {
        $already = ReturnedProducts::where('order_product_id',$request->order_product_id)->where('order_id', $request->order_id)->first();
        if($already){
            return response(['message' => __('you have already requested to return this product')]);
        }else{
            $returned = ReturnedProducts::create($request->validated());
            return new ReturnedsResource($returned);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateReturningRequest  $request
     * @param  int  $id
     * @return ReturnedsResource
     */
    public function update(UpdateReturningRequest $request, $id )
    { 
        $returnedProduct = ReturnedProducts::findorfail($id);
        $returnedProduct->update($request->validated());
        if($returnedProduct->status == 'approved'){
            $order = Order::findorfail($returnedProduct->order_id);
            if(Str::contains($order->region_id, 'region_') == false){

                $delivery_order = new Dotman(config('services.product_delivery.api'));
                $data = [
                    "name" =>$order->customer->name,
                    "phone" =>$order->customer->user->phone,
                    "region_id" => $order->region_id,
                    "address" => $order->address,
                    "cod" => 0,
                    "ecom_ref_no" => "refnofromcom"
                ];
                $delivery_order = $delivery_order->createOrder($data);
                $Product = ReturnedProducts::findorfail($id);
                $Product->update([
                    'delivery_ref_id' => $delivery_order['data']['ref_no'],
                    'region_id' => $order->region_id,
                ]);
            } 
            $order_product = OrderProduct::where([
                'product_id' => $returnedProduct->order_product_id,
                'order_id' => $returnedProduct->order_id
                ])->first(); 
            
            if($returnedProduct->status == 'approved'){
                $order_product->update(['status'=> 'returned']);
                
            }
        }
        if (! $request->expectsJson()) {
            return redirect()->route('admin.orders.returned');
        }
        return  $returnedProduct;
    }

}
