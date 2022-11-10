<?php

namespace App\Http\Controllers;

use App\Collections\AdvertisementsCollection;
use App\Http\Requests\CreateOrUpdateAdvertisementRequest;
use App\Http\Resources\AdvertisementResource;
use App\Models\Advertisement;
use App\Services\UploadImageServices;
use Illuminate\Http\Request;

class AdvertisementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return AdvertisementResource::collection(AdvertisementsCollection::collection($request));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOrUpdateAdvertisementRequest  $request
     * @return AdvertisementResource
     */
    public function store(CreateOrUpdateAdvertisementRequest $request)
    {
        $media = UploadImageServices::upload($request->media, 'advertisements');
        $advertisement = Advertisement::updateOrCreate(['id' => $request->id], [
            'title' => $request->title,
            'description' => $request->description,
            'media' => $media,
            'url' => $request->url,
            'expire_at' => $request->expire_at,
        ]);
        return new AdvertisementResource($advertisement);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return mixed
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();
        return response(['message' => __('advertisement has been deleted')]);
    }
}
