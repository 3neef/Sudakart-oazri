<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartCounter extends Component
{
    protected $listeners = ['cart-added' => 'render'];
    public function render()
    {
        $cart_count = Cart::content()->count();
        $cart = Cart::content();
        $total = Cart::initial();
        return view('livewire.cart-counter')
            ->with([
                'cart_count' => $cart_count,
                'cart' => $cart,
                'total' => $total
            ]);
    }
}
