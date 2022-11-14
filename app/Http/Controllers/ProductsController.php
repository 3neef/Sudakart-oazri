<?php

namespace App\Http\Controllers;

use App\Collections\ProductsCollection;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductOffer;
use App\Models\UpSellProducts;
use App\Services\ProductOptionsServices;
use App\Services\UploadImageServices;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Print_;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return ProductResource::collection(ProductsCollection::collection($request));
    }

    public function deal(Request $request)
    {
        $perPage = $request->limit  ? $request->limit : 50;
        $products = Product::whereHas('offers', function ($q) {
            $q->whereDate('expire_at', today());
        })->paginate($perPage);
        return $products;
    }
    public function stoped(Request $request)
    {
        $perPage = $request->limit  ? $request->limit : 50;
        $products = Product::where('shop_id', auth()->user()->userable->shop->id)->where('stop', 1)->orderBy('views', 'desc')->paginate($perPage);
        return $products;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOrUpdateProductRequest  $request
     * @return ProductResource
     */
    public function store(CreateProductRequest $request)
    {
        // dd($request);

        $image = '';
        if ($request->file('image')) {
            $image = UploadImageServices::upload($request->file('image'), 'products');
        }

        $product = Product::updateOrCreate(['id' => $request->id], [
            'shop_id'       => auth()->user()->userable->shop->id,
            'category_id'   => $request->category_id,
            'name'          => $request->name,
            'en_name'       => $request->en_name,
            'sku'           => $request->sku,
            'weight'        => $request->weight,
            'frs'           => $request->frs,
            'price'         => $request->price,
            'image'         => $image,
            'quantity'      => $request->quantity,
            'warranty'      => $request->warranty,
            'cost'          => $request->cost,
            'description'   => $request->description,
            'en_description' => $request->en_description
        ]);

        if ($request->images) {
            UploadImageServices::productImages($request, $product);
        }

        if ($request->options) {
            ProductOptionsServices::addProductOption($request->options, $product->id);
        }

        if (! $request->expectsJson()) {
            return redirect()->route('admin.products.index');
        }
        return new ProductResource($product);
    }


    public function update(UpdateProductRequest $request, $id)
    {
        // dd($request->options);
        $product = Product::findOrFail($id);

        if ($request->file('image')) {
            $image = UploadImageServices::upload($request->file('image'), 'products');
            $product->update(['image' => $image]);
        }
        $product->update([
            'category_id'   => $request->category_id,
            'name'          => $request->name,
            'en_name'       => $request->en_name,
            'sku'           => $request->sku,
            'weight'        => $request->weight,
            'frs'           => $request->frs,
            'price'         => $request->price,
            'quantity'      => $request->quantity,
            'warranty'      => $request->warranty,
            'cost'          => $request->cost,
            'description'   => $request->description,
            'en_description' => $request->en_description
        ]);


        if ($request->options && $request->options[0]['increment'] != null) {
            $options = ProductOptionsServices::addProductOption($request->options, $product->id);
            $product->update(['options' => $options]);
        }
        if (! $request->expectsJson()) {
            return redirect()->route('admin.products.index');
        }
        return new ProductResource($product);
    }

    public function show(Product $product)
    {
        Product::where('id', $product->id)->increment('views');
        $linked_products = Product::where('stop',0)
        ->where('id', '!=', $product->id)
        ->whereRaw('(name like ? or en_name like ?)',["%". $product->name ."%","%". $product->en_name ."%"])
        ->get();
        return (object) array('product' => new ProductResource($product) , 'linked_products' => $linked_products);
    }

    public function mostviews()
    {
        $most = Product::orderBy('views', 'desc')
            ->take(5)
            ->paginate(5);

        return ProductResource::collection($most);
    }

    public function random()
    {
        $ids = Product::pluck('id');


        $random = $ids->random(5);
        $rand = Product::whereIn('id', $random)->get();
        return ProductResource::collection($random);
    }

    public function stopProduct(UpdateCouponRequest $request, Product $product)
    {
        if (
            auth()->user()->userable_type == 'App\Models\Admin' ||
            auth()->user()->userable->shop->id == $product->shop_id
        ) {
            $product->update($request->validated());
            return new ProductResource($product);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return mixed
     */
    public function destroy(Product $product)
    {
        if (
            auth()->user()->userable_type == 'App\Models\Admin' ||
            auth()->user()->userable->shop->id == $product->shop_id
        ) {
            $product->delete();
            UpSellProducts::where('product_id', $product->id)->delete();
            ProductOffer::where('product_id', $product->id)->delete();
            return response(['message' => 'product has been deleted']);
        }
        abort(403, __('access un authorized resource'));
    }
}
