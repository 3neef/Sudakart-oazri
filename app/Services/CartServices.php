<?php


namespace App\Services;


use App\Models\Cart;
use App\Models\CartOption;

class CartServices
{
    public static function CartOptions (array $options, Cart $cart) {
        foreach ($options as $option) {
            CartOption::create(array_merge(['cart_id' => $cart->id], $option));
        }
        return true;
    }
}
