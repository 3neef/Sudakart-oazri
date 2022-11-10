<?php

namespace App\Http\Controllers;

use App\Collections\AttributesCollection;
use App\Http\Requests\CreateOrUpdateAttributeRequest;
use App\Http\Resources\AttributeResource;
use App\Models\Attribute;
use App\Services\OptionsServices;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return AttributesCollection::collection($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOrUpdateAttributeRequest  $request
     * @return AttributeResource
     */
    public function store(CreateOrUpdateAttributeRequest $request)
    {
        $attribute = Attribute::updateOrCreate(['name' => $request->name, 'id' => $request->id], $request->validated());
        if ($request->options) {
            OptionsServices::createOption($attribute->id, $request->options);
        }
        return new AttributeResource($attribute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return response(['message' => __('attribute has been deleted')]);
    }
}
