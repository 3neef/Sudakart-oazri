<?php

namespace App\Http\Controllers\Admin;

use App\Collections\CouponsCollection;
use App\Collections\OffersCollection;
use App\Collections\UpSellsCollection;
use App\Http\Controllers\Controller;
use App\Http\Resources\UpSellsResource;
use App\Models\Article;
use App\Models\Notification;
use App\Models\Product;
use App\Models\Slider;
use App\Models\UpSell;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function offers(Request $request)
    {
        $offers = OffersCollection::collection($request);
        return view('panel.promotions.offers.index', compact('offers'));
    }
    public function Createoffers()
    {
        if(App::getLocale() == 'en'){
            $products = Product::where('shop_id', auth()->user()->userable->shop->id)->pluck('en_name', 'id');
            
        }else{
            $products = Product::where('shop_id', auth()->user()->userable->shop->id)->pluck('name', 'id');

        }
        return view('panel.promotions.offers.create', compact('products'));
    }
    public function coupons(Request $request)
    {
        $coupons = CouponsCollection::collection($request);
        return view('panel.promotions.coupons.index', compact('coupons'));
    }
    public function Createcoupons()
    {
        return view('panel.promotions.coupons.create');
    }

    public function blogs(Request $request)
    {
        $perPage = $request->limit  ? $request->limit : 50;
        if (Auth::user() != null && Auth::user()->userable_type == 'App\Models\Vendor') {
            $articles  = Article::where('shop_id', auth()->user()->userable->shop->id)
            ->with('shop')
            ->with('comments')
            ->with('products')
            ->paginate($perPage);
        } else {
            $articles  = Article::with('shop')
            ->with('comments')
            ->with('products')
            ->paginate($perPage);
        }
        return view('panel.promotions.blogs.index', compact('articles'));
    }
    public function Createblogs()
    {
        if (auth()->user()->userable_type == 'App\Models\Vendor'){
            if(App::getLocale() == 'en'){
                $products = Product::where('shop_id', auth()->user()->userable->shop->id)->pluck('en_name', 'id');
                
            }else{
                $products = Product::where('shop_id', auth()->user()->userable->shop->id)->pluck('name', 'id');
    
            }
        }else{
            if(App::getLocale() == 'en'){
                $products = Product::pluck('en_name', 'id');
                
            }else{
                $products = Product::pluck('name', 'id');
    
            }
        }
        return view('panel.promotions.blogs.create', compact('products'));
    }
    public function showblog(Request $request, Article $article)
    {
        return view('panel.promotions.blogs.show', compact('article'));
    }
    public function approve(Request $request, Article $article)
    {
        if ($article->approved == true) {
            $article->update([
                'approved' => 0
            ]);
        
        }else{

            $article->update([
                'approved' => 1
            ]);
        }
        return redirect()->route('admin.blogs');

    }
    public function ads()
    {
        $ads = Slider::paginate(10);
        return view('panel.promotions.ads.index', compact('ads'));
    }
    public function adscreate()
    {
        if(App::getLocale() == 'en'){
            $products = Product::where('stop', 0)->pluck('en_name', 'id');
            
        }else{
            $products = Product::where('stop', 0)->pluck('name', 'id');

        }
        // dd($products);
        return view('panel.promotions.ads.create', compact('products'));
    }
    public function pushNotifications()
    {
        if (auth()->user()->userable_type == 'App\Models\Admin'){
            
            $notifications = Notification::where('type', 'specified')->orWhere('type', 'App\Models\Vendor')->orWhere('type', 'App\Models\Customer')->paginate(10); 
            
        }else{
            
            $notifications = Notification::where('user_id', auth()->user()->id)->orWhere('type', 'App\Models\Vendor')->paginate(10);
        }

        return view('panel.promotions.notifications.index', compact('notifications'));
    }
    public function SendpushNotifications()
    {
        return view('panel.promotions.notifications.create');
    }
    public function SendspecifiedNotifications()
    {
        $users = User::whereNotNull('fcm_token')->pluck('phone', 'id');
        // dd($users);
        return view('panel.promotions.notifications.specified', compact('users'));
    }
    public function bulk()
    {
        return view('panel.promotions.bulk.index');
    }
    public function Sendbulk()
    {
        return view('panel.promotions.bulk.create');
    }
    public function whatsapp()
    {
        return view('panel.promotions.whatsapp.index');
    }
    public function Sendwhatsapp()
    {
        return view('panel.promotions.whatsapp.create');
    }
    public function upselling(Request $request)
    {
        $upsells = UpSellsResource::collection(UpSellsCollection::collection($request));
        return view('panel.promotions.upselling.index', compact('upsells'));
    }
    public function Createupselling()
    {
        $products = Product::where('shop_id', auth()->user()->userable->shop->id)->pluck('name', 'id');
        return view('panel.promotions.upselling.create', compact('products'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        if (auth()->user()->userable_type == 'App\Models\Vendor'){
            if(App::getLocale() == 'en'){
                $products = Product::where('shop_id', auth()->user()->userable->shop->id)->pluck('en_name', 'id');
                
            }else{
                $products = Product::where('shop_id', auth()->user()->userable->shop->id)->pluck('name', 'id');
    
            }
        }else{
            if(App::getLocale() == 'en'){
                $products = Product::pluck('en_name', 'id');
                
            }else{
                $products = Product::pluck('name', 'id');
    
            }
        }
        return view('panel.promotions.blogs.edit', compact(['products', 'article']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
