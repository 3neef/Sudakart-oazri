<?php

namespace App\Http\Livewire;

use App\Models\Favourite;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowWishlist extends Component
{
    protected $listeners = ['wishlist-view' => 'render'];
    public $product_id;
    
    public function render()
    {
        $favs = Favourite::with('product','customer')->where('customer_id',Auth::guard('web')->user()->userable->id)->orderBy('id','desc')->get();
        return view('livewire.show-wishlist')->with(['favs' => $favs]);
    }

    public function removeFav($product_id)
    {
        Favourite::with('product','customer')
                ->where('product_id',$product_id)
                ->where('customer_id',Auth::guard('web')->user()->userable->id)
                ->delete();
        $this->emit('wishlist-view');
        $this->emit('wishlist-counter');
    }
}
