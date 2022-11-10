<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOptionsRequest;
use App\Models\Option;
use App\Services\OptionsServices;

class OptionsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOptionsRequest  $request
     * @return mixed
     */
    public function store(CreateOptionsRequest $request)
    {
        OptionsServices::createOption($request->attribute_id, $request->options);
        return Option::where('attribute_id', $request->attribute_id)->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return mixed
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return response(['message' => __('option has been deleted')]);
    }
}
