<?php

namespace App\Http\Controllers;

use App\Collections\UpSellsCollection;
use App\Http\Requests\RemoveUpSellProductsRequest;
use App\Http\Requests\UpdateOrCreateUpSellsRequest;
use App\Http\Resources\UpSellsResource;
use App\Models\UpSell;
use App\Models\UpSellProducts;
use App\Services\UpSellsServices;
use Illuminate\Http\Request;

class UpSellsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return UpSellsResource::collection(UpSellsCollection::collection($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UpdateOrCreateUpSellsRequest $request
     * @return UpSellsResource
     */
    public function store(UpdateOrCreateUpSellsRequest $request)
    {
        $upsell = UpSell::updateOrCreate(['id' => $request->id], [
            'shop_id' => auth()->user()->userable->shop->id,
            'discount' => $request->discount/100
        ]);
        UpSellsServices::addProducts($upsell, $request->products);
        if (! $request->expectsJson()) {
            return redirect()->route('admin.upselling');
        }
        return new UpSellsResource($upsell);
    }

    public function update(UpdateOrCreateUpSellsRequest $request, $id){
        $upsell = UpSell::findOrFail($id);
        $upsell->update($request->all());
        UpSellsServices::upProducts($upsell, $request->products);
        if (! $request->expectsJson()) {
            return redirect()->route('admin.upselling');
        }
        return new UpSellsResource($upsell);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeProducts (RemoveUpSellProductsRequest $request, $id) {
        UpSellProducts::where('up_sell_id', $id)->whereIn('product_id', $request->products)->delete();
        return response(['message' => __('upsell has been deleted')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $deleted = UpSell::findOrFail($id)->delete();
        if($deleted){
            $products = UpSellProducts::where('up_sell_id', $id)->delete();
        }
        if (! $request->expectsJson()) {
            return redirect()->route('admin.upselling');
        }
        return response(['message' => __('upsell has been deleted')]);
    }
}
