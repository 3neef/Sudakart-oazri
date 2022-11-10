<?php


namespace App\Services;


use App\Models\Product;
use App\Models\ProductImage;

class UploadImageServices
{
    public static function upload ($image, $file) {
        $extension = $image->getClientOriginalExtension();
        $name = $file . time()  .'.' . $extension;
        $path = $image->storeAs('public/'.$file, $name);
        return str_replace('public/', '', $path);
    }

    public static function productImages ($request, Product $product) {
        foreach ($request->images as $image) {
             
            $extension = $image->getClientOriginalExtension();
             
            $name = 'products' . time()  .'.' . $extension;
            $path = $image->storeAs('public/products', $name);
            $img = str_replace('public/', '', $path);
            ProductImage::updateOrCreate( [
                'product_id' => $product->id, 'image' => $img
            ]);
        }
        return true;
    }

}
