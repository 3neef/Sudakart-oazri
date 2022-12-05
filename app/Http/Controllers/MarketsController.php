<?php

namespace App\Http\Controllers;

use App\Collections\MarketsCollection;
use App\Http\Requests\CreateOrUpdateMarketRequest;
use App\Models\Market;
use Illuminate\Http\Request;

class MarketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return MarketsCollection::collection($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOrUpdateMarketRequest  $request
     * @return mixed
     */
    public function store(CreateOrUpdateMarketRequest $request)
    {
        Market::create($request->validated());
        return redirect()->route('admin.markets')->with('success', __('toastr.added'));
    }

    public function update(CreateOrUpdateMarketRequest $request, Market $market)
    {
        $market->update($request->validated());
        return redirect()->route('admin.markets')->with('success', __('toastr.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return mixed
     */
    public function destroy(Market $market, Request $request)
    {
        $market->delete();
        if (! $request->expectsJson()) {
            return redirect()->route('admin.markets')->with('error', __('toastr.deleted'));
        }
        return response(['message' => __('market has been deleted')]);
    }
}
