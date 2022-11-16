<?php

namespace App\Http\Controllers\Admin;

use App\Collections\ProductsCollection;
use App\Collections\RatesCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Option;
use App\Models\Product;
use App\Models\ProductOffer;
use App\Models\ShopCategory;
use App\Models\UpSellProducts;
use App\Services\ProductOptionsServices;
use App\Services\UploadImageServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $products = ProductResource::collection(ProductsCollection::collection($request));
        return view('panel.products.index', compact('products'));
    }

    public function search(Request $request)
    {
        if($request->has('q')){
            if(Auth::user() != null && Auth::user()->userable_type == 'App\Models\Vendor'){
                $search = Product::where('shop_id', auth()->user()->userable->shop->id)->whereRaw('(name like ? or en_name like ? or sku like ?)',["%".$request->q."%","%".$request->q."%","%".$request->q."%"])
                ->paginate(10);
                $products =  ProductResource::collection($search);
            }else {
                $search = Product::whereRaw('(name like ? or en_name like ? or sku like ?)',["%".$request->q."%","%".$request->q."%","%".$request->q."%"])
                ->paginate(10);
                $products =  ProductResource::collection($search);
            }

            return view('panel.products.index', compact('products'));
        }
    }

    public function create()
    {
        $shop_categories = ShopCategory::where('shop_id', auth()->user()->userable->shop->id)->pluck('category_id');
        $categories = Category::whereIn('id',$shop_categories )->pluck('name', 'id');
        $options = Option::pluck('en_option', 'id');
        return view('panel.products.create', compact(['options','categories']));
    }

    public function stoped(Request $request)
    {
        $perPage = $request->limit  ? $request->limit : 50;
        if (auth()->user()->userable_type == 'App\Models\Vendor') {
        $products = Product::where('shop_id', auth()->user()->userable->shop->id)->where('stop', 1)->orderBy('views', 'desc')->paginate($perPage);
        } else {
        $products = Product::where('stop', 1)->orderBy('views', 'desc')->paginate($perPage);
        }
        return view('panel.products.stoped', compact('products'));
    }

    public function stop(Request $request, Product $product)
    {
        if ($product->stop == true) {
            $product->update([
                'stop' => 0
            ]);
        
        }else{

            $product->update([
                'stop' => 1
            ]);
        }
        return redirect()->route('admin.products.index');

    }

    public function rates(Request $request)
    {
        $rates = RatesCollection::collection($request);
        return view('panel.products.rates', compact('rates'));
    }


    public function show(Product $product)
    {
        $product->increment('views');
        $pro = new ProductResource($product);
        return view('panel.products.show', compact('pro'));
    }

    public function edit(Product $product)
    {
        if (auth()->user()->userable_type == 'App\Models\Vendor') {
        $shop_categories = ShopCategory::where('shop_id', auth()->user()->userable->shop->id)->pluck('category_id');
        } else {
        $shop_categories = ShopCategory::pluck('category_id');
        }
        $categories = Category::whereIn('id',$shop_categories )->pluck('name', 'id');
        $options = Option::pluck('en_option', 'id');
        $pro = new ProductResource($product);
        return view('panel.products.edit', compact(['pro', 'categories', 'options' ]));
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
            return redirect()->back();
        }
        abort(403, __('access un authorized resource'));
    }
}
