<?php

namespace App\Http\Controllers;

use App\Collections\CategoriesCollection;
use App\Http\Requests\CreateOrUpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\UploadImageServices;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return CategoryResource::collection(CategoriesCollection::collection($request));
    }

    public function shopcategories(Request $request)
    {
        $categories = auth()->user()->userable->shop->categories;
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOrUpdateCategoryRequest  $request
     * @return CategoryResource
     */
    public function store(CreateOrUpdateCategoryRequest $request)
    {
        $image = '';
        if ($request->file('image')) {
            $image = UploadImageServices::upload($request->file('image'), 'categories');
        }

        $category = Category::updateOrCreate(['name' => $request->name, 'id' => $request->id], [
            'name'          => $request->name,
            'en_name'       => $request->en_name,
            'parent_id'     => $request->parent_id,
            'commission'    => $request->commission,
            'image'         => $image,
            'color'         => $request->color,
        ]);

        return new CategoryResource($category);
    }

    public function update(CreateOrUpdateCategoryRequest $request, Category $category)
    {
        if ($request->file('image')) {
            $image = UploadImageServices::upload($request->file('image'), 'categories');
        }

        $category->update([
            'name'          => $request->name,
            'en_name'       => $request->en_name,
            'parent_id'     => $request->parent_id,
            'commission'    => $request->commission,
            'image'         => $image,
            'color'         => $request->color,
        ]);

        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return CategoryResource
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return mixed
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response(['message' => __('category has been deleted')]);
    }
}
