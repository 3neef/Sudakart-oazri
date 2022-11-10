<?php

namespace App\Http\Controllers;

use App\Collections\CanceledCollection;
use App\Http\Requests\CreateCanceledRequest;
use App\Http\Requests\UpdateCanceledRequest;
use App\Http\Resources\CanceledResource;
use App\Models\CanceledOrder;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class CanceledOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return CanceledResource::collection(CanceledCollection::collection($request));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCanceledRequest $request)
    {
        $order_id = $request->order_id;
        $order = Order::findorfail($order_id);
        $has_taken_product = OrderProduct::where('order_id', $order_id)->where('status','taken')->first();

        if($has_taken_product)
        {
            return response(['message' => __('your order has already been picked up')]);
        }else{
            $canceled = CanceledOrder::create($request->validated());
            $order->update(['status'=>'canceled']);
            $canceled_order_products = OrderProduct::where('order_id', $canceled->order_id)->get();
            if ($order->status == 'canceled') {
                foreach ($canceled_order_products as $product) {
                    $product->update(['status' => 'canceled']);
                }
            }
            return new CanceledResource($canceled);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCanceledRequest $request, $id)
    {
        // $canceled = CanceledOrder::findorfail($id);
        // $canceled->update($request->validated());
        // $canceled_order = Order::where('id', $canceled->order_id);
        // $canceled_order_products = OrderProduct::where('order_id', $canceled->order_id)->get();
        // if($canceled->status == 'approved'){
        //     $canceled_order->update(['status'=> 'canceled']);
        //     foreach($canceled_order_products as $product){
        //         $product->update(['status'=>'canceled']);
        //     }
            
        // }
        // return $canceled;
    }

    /**
     * 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
