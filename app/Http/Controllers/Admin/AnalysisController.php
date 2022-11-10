<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Article;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnalysisController extends Controller
{
    public function mostviewed()
    {
        if (Auth::user() != null && Auth::user()->userable_type == 'App\Models\Vendor') {
            $most = Product::where('shop_id', auth()->user()->userable->shop->id)->orderBy('views', 'desc')
            ->take(5)
                ->get();
        } else {
            $most = Product::orderBy('views', 'desc')
            ->take(5)
                ->get();
        }
        $products =  ProductResource::collection($most);
        return view('panel.analytics.mostviewed', compact(['products']));
    }
    public function mostsold()
    {
        if (Auth::user() != null && Auth::user()->userable_type == 'App\Models\Vendor') {
            $most = Product::where('shop_id', auth()->user()->userable->shop->id)->whereHas('orders')->withCount('orders')
            ->take(5)
                ->get();
        } else {
            $most = Product::whereHas('orders')->withCount('orders')
            ->take(5)
                ->get();
        }
        $products =  ProductResource::collection($most);
        return view('panel.analytics.mostsold', compact(['products']));
    }
    public function vipvendor()
    {
        $vendors = Vendor::where('type', 'premium')->paginate(10);
        return view('panel.analytics.vipvendor', compact(['vendors']));
    }
    public function mostviewedBlogs()
    {
        if (Auth::user() != null && Auth::user()->userable_type == 'App\Models\Vendor') {
            $articles = Article::orderBy('views', 'desc')
            ->where('shop_id', auth()->user()->userable->shop->id)
                ->take(5)
                ->get();
        } else {
            $articles = Article::orderBy('views', 'desc')
            ->take(5)
                ->get();
        }

        return view('panel.analytics.mostviewedBlogs', compact(['articles']));
    }
    public function SalesVsReturns()
    {
        return view('panel.analytics.SalesVsReturns');
    }
}
