<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use App\Models\Product;

class ShowCart extends Component
{
    protected $listeners = ['cart-view' => 'render' ,'removeFromCart'];

    public function render()
    {
        $cart = Cart::content();
        $total = Cart::initial();
        return view('livewire.show-cart')
            ->with([
                'cart' => $cart,
                'total' => $total
            ]);
    }


    public function removeFromCart($rowId)
    {
        Cart::remove($rowId);
        $this->dispatchBrowserEvent('product-deleted'); // add this
        $this->emit('cart-view');
        $this->emit('cart-added');
        
    }
}
