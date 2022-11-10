<?php

namespace App\Http\Controllers;

use App\Collections\CouponsCollection;
use App\Http\Requests\CreateCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Http\Resources\CouponResource;
use App\Models\Coupon;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return CouponsCollection::collection($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCouponRequest  $request
     * @return CouponResource
     */
    public function store(CreateCouponRequest $request)
    {
        $shop = auth()->user()->userable->shop;
        $coupon = Coupon::create(array_merge(['shop_id' => $shop->id], $request->validated()));
        if (! $request->expectsJson()) {
            return redirect()->route('admin.coupons');
        }
        return new CouponResource($coupon);
    }

    public function showbycode(Coupon $coupon){
        $used = OrderProduct::where('coupon_id', $coupon)->where('');
        return $coupon;
    }

    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        $coupon->update($request->validated());
        if (! $request->expectsJson()) {
            return redirect()->route('admin.coupons');
        }
        return new CouponResource($coupon);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return mixed
     */
    public function destroy(Request $request, Coupon $coupon)
    {
        $coupon->delete();
        if (! $request->expectsJson()) {
            return redirect()->route('admin.coupons');
        }
        return response(['message' => __('co$coupon has been deleted')]);
    }
}
 