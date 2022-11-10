<?php

namespace App\Http\Controllers;

use App\Collections\RatesCollection;
use App\Http\Requests\CreateRateRequest;
use App\Http\Resources\RateResource;
use App\Models\Rate;
use App\Models\Vendor;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return RatesCollection::collection($request);
    }

    public function vendorRate(Request $request){
        $perPage = $request->limit  ? $request->limit : 50;
        $rates  = Rate::whereHas('product', function ($q) {
            $vendor =  Vendor::where('id',auth()->user()->userable->id)->first();
            $q->where('shop_id',  $vendor->shop->id);
        })->with('product')->paginate($perPage);

        
        // $orders = Order::whereIn('id',$ordersProduct)->get();
        return $rates; 
    }

    public function productrate($id){
        $rates  = Rate::where('product_id', $id)->with('customer')->paginate(5);
        return $rates; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRateRequest  $request
     * @return RateResource
     */
    public function store(CreateRateRequest $request)
    {
        $customer = auth()->user()->userable;
        $rate = Rate::updateOrCreate([
            'customer_id' => $customer->id,
            'product_id' => $request->product_id
        ],
        array_merge(['customer_id' => $customer->id], $request->validated())
        );

        return new RateResource($rate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return mixed
     */
    public function destroy(Rate $rate)
    {
        $rate->delete();
        return response(['message' => __('rate had been deleted')]);
    }
}
