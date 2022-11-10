<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateDeliveryMethodRequest;
use App\Models\DeliveryMethod;
use App\Models\Region;
use Illuminate\Support\Facades\Http;

class DeliveryMethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'key' => env('PRODUCT_DELIVERY')
        ];
        $url = 'https://hood.dotoman.net/api/regions' . '?' . http_build_query($data);
        $response = Http::contentType("application/json")->bodyFormat('json')->post($url, [
            'body' => 'FETCH....'
        ])->json();
        $regions = $response['data']['regions'];
        $regions_v2 = Region::select('region_id', 'region', 'region_delivery_fee')->get();
        $obj = (object)  array_merge($regions_v2->toArray(), $regions);
        return $obj;
    }

    public function retrieve_regions($data) {
        $url = 'https://hood.dotoman.net/api/regions' . '?' . http_build_query($data);
        $response = Http::contentType("application/json")->bodyFormat('json')->post($url, [
            'body' => 'FETCH....'
        ])->json();
        $regions = $response['data']['regions'];
        return $regions;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateOrUpdateDeliveryMethodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrUpdateDeliveryMethodRequest $request)
    {
        return DeliveryMethod::updateOrCreate([$request->name], $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return mixed
     */
    public function destroy(DeliveryMethod $method)
    {
        $method->delete();
        return response(['message' => __('method has been deleted')]);
    }
}
