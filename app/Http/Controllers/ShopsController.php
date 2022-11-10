<?php

namespace App\Http\Controllers;

use App\Collections\ShopsCollection;
use App\Http\Requests\UpdateShopRequest;
use App\Http\Resources\ShopResource;
use App\Models\Shop;
use App\Services\ShopsServices;
use Illuminate\Http\Request;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return ShopsCollection::collection($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ShopResource
     */
    public function show(Shop $shop)
    {
        if (auth()->user() && auth()->user()->userable_type == 'App\Models\Vendor') {
            $shop = Shop::where('vendor_id', auth()->user()->userable->id)->with('categories.category')->first();
        }
        return new ShopResource($shop);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateShopRequest  $request
     * @param  int  $id
     * @return ShopResource
     */
    public function update(UpdateShopRequest $request, Shop $shop)
    {
        if (auth()->user() && auth()->user()->userable_type == 'App\Models\Vendor') {
            $shop = Shop::where('vendor_id', auth()->user()->userable->id)->first();
        }
        $shop->update($request->validated());
        ShopsServices::addCategory($shop, $request->categories);
        return new ShopResource($shop);
    }

}
