<?php


namespace App\Services;


class UpSellsServices
{
    public static function addProducts ($upsell, $products) {
        foreach ($products as $product) {
            $upsell->products()->create($product);
        }
        return $upsell;
    }

    public static function upProducts ($upsell, $products) {
        foreach ($products as $product) {
            $upsell->products()->update($product);
        }
        return $upsell;
    }
}

