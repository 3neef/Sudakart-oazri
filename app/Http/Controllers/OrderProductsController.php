<?php

namespace App\Http\Controllers;

use App\Collections\OrdersProductsCollection;
use App\Http\Requests\InboundRequest;
use App\Http\Requests\UpdateOrdersProductsRequest;
use App\Http\Resources\OrderProductsResource;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return OrderProductsResource::collection(OrdersProductsCollection::collection($request));
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateOrdersProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrdersProductsRequest $request,$id)
    {
        

        $product = OrderProduct::findorfail($id);

        $product->update([
            'driver_id' => $request->driver_id,
            'status' => $request->status,
            'product_id'=>$request->product_id,
        ]);

        return response(['message' => __('products in orders have been updated')]);
    }

    public function InboundUpdate(InboundRequest $request,$id)
    {
        $product = OrderProduct::findorfail($id);
        $product->update($request->validated());
        $order = Order::findorfail($product->order_id);
        if($request->status == 'taken'){
            $order->update([
                'status'=> 'in progress',
                'approved'=> 0
            ]);
        }

        return response(['message' => __('order has been updated')]);
    }
}
