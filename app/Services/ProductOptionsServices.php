<?php


namespace App\Services;


use App\Models\Product;
use App\Models\ProductOption;

class ProductOptionsServices
{
    public static function addProductOption (array $options, $product_id) {
    
        foreach ($options as $option) {
            ProductOption::create(array_merge(['product_id' => $product_id], $option));
        }
        return true;
    }
}
