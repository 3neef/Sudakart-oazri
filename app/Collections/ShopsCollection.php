<?php


namespace App\Collections;


use App\Filters\VendorShopFilter;
use App\Models\Shop;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ShopsCollection
{
    public static function collection (Request $request) {

        $defaultSort = '-created_at';

        $defaultSelect = [
            'id',
            'vendor_id',
            'shop_name',
            'shop_en_name',
            'shop_address',
            'lat',
            'long',
            'created_at',
            'updated_at',
        ];

        $allowedFilters = [
            'id',
            'uuid',
            'vendor_id',
            'shop_name',
            'shop_en_name',
            'shop_address',
            'lat',
            'long',
            'created_at',
            'updated_at',
            AllowedFilter::custom('my_shop', new VendorShopFilter)->default(auth()->user())
        ];

        $allowedSorts = [
            'updated_at',
            'created_at',
        ];

        $allowedIncludes = [
            'vendor',
            'products',
            'offers',
            'categories'
        ];


        $perPage = $request->limit  ? $request->limit : 100;

        return QueryBuilder::for(Shop::class)
            ->select($defaultSelect)
            ->allowedFilters($allowedFilters)
            ->allowedSorts($allowedSorts)
            ->with('categories')
            ->allowedIncludes($allowedIncludes)
            ->defaultSort($defaultSort)
            ->paginate($perPage);
    }

}
