<?php

namespace App\Http\Controllers;

use App\Models\CategoryRequest;
use App\Http\Requests\StoreCategoryRequestRequest;
use App\Http\Requests\UpdateCategoryRequestRequest;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryRequestResource;
use Illuminate\Support\Facades\DB;
use App\Collections\CategoryRequestCollection;

class CategoryRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return CategoryRequestCollection::collection($request);
        return CategoryRequest::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequestRequest $request)
    {
        $categoryRequest = CategoryRequest::updateOrCreate(['shop_id' => auth()->user()->userable->shop->id, 'id' => $request->id], $request->validated());
        if (! $request->expectsJson()) {
            return redirect()->route('admin.vendors.pending.categories');
        }
        return $categoryRequest;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequestRequest  $request
     * @param  \App\Models\CategoryRequest  $categoryRequest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequestRequest $request, $id)
    {
        $categoryRequest = CategoryRequest::findOrFail($id);
        $categoryRequest->update($request->validated());
        if ($categoryRequest->approved == true) {
            DB::table('shop_categories')->insert(
                array(
                    'shop_id' => $categoryRequest->shop_id, 
                    'category_id' => $categoryRequest->category_id
                    )
                );
                
            }
            return $categoryRequest;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryRequest  $categoryRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryRequest = CategoryRequest::findOrFail($id);
        $categoryRequest->delete();
        return redirect()->back();
    }
}
