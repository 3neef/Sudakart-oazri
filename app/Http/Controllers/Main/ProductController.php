<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
   

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $latestProduct = Product::orderBy('id','desc')->where('stop',0)->limit(3)->get();
        $related = Product::where('category_id',$product->category_id)
            ->orderBy('views','desc')->limit(6)->get();
        return view('main.product.show')
            ->with([
                'product' => $product ,
                'latestProduct' => $latestProduct,
                'related' => $related,
            ]);
    }


    public function ProductByCategory(Request $request , $id)
    {
       
       $category = Category::findOrFail($id);
       $perPage = $request->limit  ? $request->limit : 24;
       $products = Product::where('category_id',$category->id)->paginate($perPage);
       return view('main.category.show')
                ->with([
                    'category' => $category,
                    'products' => $products
                ]);
    }

    public function ProductsPerPage(Request $request)
    {
    
        $products = Product::where('category_id',$request->category)->paginate($request->perpage);
        
        $view = view('main.category.getProducts')->with('products',$products)->render();
        echo $view;
    }
}
