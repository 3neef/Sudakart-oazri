<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCartRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Services\CartServices;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CartResource
     */
    public function index()
    {
        $cart = Cart::where('customer_id', auth()->user()->userable->id)->get();
        return new CartResource($cart);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCartRequest  $request
     * @return CartResource
     */
    public function store(CreateCartRequest $request)
    {
        $cart = Cart::updateOrCreate(['id' => $request->id],array_merge(['customer_id' => auth()->user()->userable_id],$request->validated()));
        if ($request->options) {
            CartServices::CartOptions($request->options, $cart);
        }
        return new CartResource($cart);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return mixed
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return response(['message' => __('cart has been deleted')]);
    }
}
