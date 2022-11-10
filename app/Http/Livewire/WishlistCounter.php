<?php

namespace App\Http\Livewire;

use App\Models\Favourite;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component as ViewComponent;
use Livewire\Component;

class WishlistCounter extends Component
{
    protected $listeners = ['wishlist-counter' => 'render'];

    public function render()
    {
        if(Auth::guard('web')->check()){
            $count = Favourite::with('product','customer')->where('customer_id',Auth::guard('web')->user()->userable->id)->count();
        }else {
            $count = 0;
        }
       
        return view('livewire.wishlist-counter')->with('count',$count);
    }
}
