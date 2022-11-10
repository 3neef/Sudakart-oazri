<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function search(Request $request)
    {
        $results = [];
        if($request->has('q')){
            if($request->has('category')){
                if($request->category == 'all'){
                    $results = Product::where('stop',0)
                    ->whereRaw('(name like ? or en_name like ?)',["%".$request->q."%","%".$request->q."%"])
                    ->paginate(16)->withQueryString();
                }else {
                    $results = Product::where('stop',0)
                    ->whereRaw('(name like ? or en_name like ?)',["%".$request->q."%","%".$request->q."%"])
                    ->orWhere('category_id',$request->category)
                    ->paginate(16)->withQueryString();
                }
            }else {
                $results = Product::where('stop',0)
                    ->whereRaw('(name like ? or en_name like ?)',["%".$request->q."%","%".$request->q."%"])
                    ->paginate(16)->withQueryString();
            }
           
        }
        
        return view('main.search')->with('results',$results);
    }


    public function wishList()
    {
        
        return view('main.wishlist.index');
    }

    public function contact()
    {
        return view('main.contact');
    }

    
}
