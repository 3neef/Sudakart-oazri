<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrDeleteFavouritesRequest;
use App\Models\Favourite;

class FavouritesController extends Controller
{

    public function index(){
        $favourites = Favourite::where('customer_id', auth()->user()->userable->id)->with('product')->get();
        return $favourites;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOrDeleteFavouritesRequest  $request
     * @return mixed
     */
    public function store(CreateOrDeleteFavouritesRequest $request)
    {
        $favourite  = Favourite::where('customer_id', auth()->user()->userable->id)
            ->where('product_id', $request->product_id)->first();

        if ($favourite) {
            $favourite->delete();
            return response(['message' => __('product has been deleted')]);
        }

        Favourite::create([
            'customer_id' => auth()->user()->userable->id,
            'product_id' => $request->product_id
        ]);

        return response(['message' => __('product has been added')]);
    }

}
