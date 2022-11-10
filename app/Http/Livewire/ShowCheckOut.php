<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShowCheckOut extends Component
{
    protected $listeners = ['check-reload' => 'render'];
    public function render()
    {
        $cart = Cart::content();
        $total = Cart::subtotal();
        $total_all = Cart::initial();
        return view('livewire.show-check-out')
                ->with([
                    'cart' => $cart,
                    'total' => $total,
                    'total_all' => $total_all 
                ]);
    }
}
