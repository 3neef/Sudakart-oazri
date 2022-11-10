<?php

namespace App\Http\Livewire;

use App\Models\Favourite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddToWishlist extends Component
{
    public $product_id;
    public $style = ""; 

    public function render()
    {
        return view('livewire.add-to-wishlist')->with('style' ,$this->style);
    }


    public function addToWishList()
    {
        if (auth('web')->user()) {
            $fav = Favourite::where('product_id',$this->product_id)
                ->where('customer_id',Auth::guard('web')->user()->userable->id)
                ->first();
            if(!$fav){
                Favourite::create([
                    'product_id' => $this->product_id ,
                    'customer_id' => Auth::guard('web')->user()->userable->id
                ]);
                $this->dispatchBrowserEvent('swal',[
                    'type' => 'success',
                    'title' => __('msg.wishlist_success_msg'),
                    'text' => '',
                ]);
            }else {
                $this->dispatchBrowserEvent('swal',[
                    'type' => 'error',
                    'title' => __('msg.wishlist_error_msg'),
                    'text' => '',
                ]);
            }
        }else {
            $this->dispatchBrowserEvent('swal',[
                'type' => 'error',
                'title' => __('msg.wishlist_error_auth_msg'),
                'text' => '',
            ]);
        }

        $this->emit('wishlist-counter');
        
    }

    
}
