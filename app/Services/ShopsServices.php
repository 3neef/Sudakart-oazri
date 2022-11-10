<?php


namespace App\Services;


use App\Models\Shop;
use App\Models\ShopCategory;
use App\Models\Vendor;
use App\Models\CategoryRequest;

class ShopsServices
{
    public static function create (Vendor $vendor, $request) {
        $shop =  $vendor->shop()->create($request->validated());
        self::addCategory($shop, $request->shop_categories);
        return $shop;
    }

    public static function addCategory(Shop $shop, $categories)
    {
        foreach ($categories as $category) {
            ShopCategory::create([
                'shop_id' => $shop->id,
                'category_id' => $category['category_id']
            ]);
        }
    }

    // Approve the category request
    public static function validateCategory(Shop $shop, $request, $categories)
    {
        $categories = CategoryRequest::where('shop_id', $shop->id)->get();

            foreach ($categories as $category) {
                if ($category->approved == true) {
                    ShopCategory::create([
                        'shop_id' => $request->shop->id,
                        'category_id' => $category['category_id']
                    ]);
            }
        }
        
    }
}
