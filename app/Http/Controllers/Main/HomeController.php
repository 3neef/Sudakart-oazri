<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\ProductOffer;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        
        $sliders = Slider::orderBy('id','desc')->get();
        $dealOfTheDay = DB::table('product_offers as pf')
                   ->select('s.name','s.en_name','s.discount',
                     DB::raw('p.id as product_id') ,
                     DB::raw('p.name as product_name'),
                     DB::raw('p.en_name as product_en_name'),
                     DB::raw('p.en_description as product_en_discription'),
                     DB::raw('p.description as product_discription'),
                     'p.price',
                     's.shop_id',
                     's.expire_at')
                    ->leftJoin('offers as s','pf.offer_id','s.id')
                    ->leftJoin('products as p','pf.product_id','p.id')
                    ->where('s.expire_at',today())
                    ->where('p.stop',0)
                    ->get();
        
        $specials = DB::table('product_offers as pf')
                    ->select('s.name','s.en_name','s.discount',
                     DB::raw('p.id as product_id') ,
                     DB::raw('p.name as product_name'),
                     DB::raw('p.en_name as product_en_name'),
                     DB::raw('p.en_description as product_en_discription'),
                     DB::raw('p.description as product_discription'),
                     'p.price',
                     's.shop_id',
                     's.expire_at')
                    ->leftJoin('offers as s','pf.offer_id','s.id')
                    ->leftJoin('products as p','pf.product_id','p.id')
                    ->where('s.expire_at','>',today())
                    ->where('p.stop',0)
                    ->get();

       
        
        
    
       
        $categories = Category::orderBy('id','desc')->limit(10)->get();
        $bestSeller = Product::whereHas('newOrder')->withCount('newOrder')
                ->where('stop',0)
                ->orderBy('new_order_count','desc')
                ->take(6)
                ->get();
        $latestProduct = Product::orderBy('id','desc')->where('stop',0)->limit(6)->get();
        $favs = $latestProduct = Product::orderBy('views','desc')->where('stop',0)->limit(6)->get();
        $articles = Article::where('approved', 1)->with('shop')
                    ->with('comments')
                    ->with('products')
                    ->limit(6)
                    ->get();
        
        return view('main.main')
            ->with([
                'sliders' => $sliders,
                'categories' => $categories,
                'latestProduct' => $latestProduct,
                'articles' =>  $articles,
                'bestSeller' => $bestSeller,
                'favs' => $favs,
                'dealOfTheDay' => $dealOfTheDay,
                'specials' => $specials,
            ]);
    }

    
}
