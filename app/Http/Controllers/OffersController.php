<?php

namespace App\Http\Controllers;

use App\Collections\OffersCollection;
use App\Http\Requests\CreateOfferRequest;
use App\Http\Requests\MassDestroyOfferRequest;
use App\Http\Resources\OfferResource;
use App\Models\ProductOffer;
use App\Models\Offer;
use App\Services\OfferServices;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return OffersCollection::collection($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOfferRequest  $request
     * @return OfferResource
     */
    public function store(CreateOfferRequest $request)
    {
        $shop = auth()->user()->userable->shop;
        $offer = Offer::create(array_merge(['shop_id' => $shop->id], $request->validated()));

        if ($request->products) {
            OfferServices::offerProducts($request->products, $offer);
        }

        if (! $request->expectsJson()) {
            return redirect()->route('admin.offers');
        }

        return new OfferResource($offer);
    }

    public function update(CreateOfferRequest $request, $id){
        $offer = Offer::findOrFail($id);
        $offer->update($request->validated());
        if ($request->products) {
            ProductOffer::where('offer_id', $offer->id)->delete();
            OfferServices::offerProducts($request->products, $offer);
        }

        return new OfferResource($offer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return OfferResource
     */
    public function show(Offer $offer)
    {
        return new OfferResource($offer);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Offer $offer)
    {
        ProductOffer::where('offer_id', $offer->id)->delete();
        $offer->delete();

        if (! $request->expectsJson()) {
            return redirect()->route('admin.offers');
        }
        return response(['message' => __('offer has been deleted')]);
    }

    // public function massDestroy(MassDestroyOfferRequest $request)
    // {
    //     Offer::whereIn('id', request('ids'))->delete();
    // }
}
