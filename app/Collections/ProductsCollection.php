<?php


namespace App\Collections;


use App\Filters\DealOfTheDayFilter;
use App\Filters\ProductSearchFilter;
use App\Filters\ProductWithOfferFilter;
use App\Filters\TopSellProductsFilter;
use App\Filters\VendorTopSellProductsFilter;
use App\Filters\VendorProductsFilter;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductsCollection
{
    public static function collection (Request $request) {

        $defaultSort = '-created_at';

        $defaultSelect = [
            'id',
            'views',
            'uuid',
            'shop_id',
            'category_id',
            'name',
            'en_name',
            'price',
            'image',
            'quantity',
            'description',
            'en_description',
            'created_at',
            'updated_at',
            'stop',
            'sku',
            'weight',
            'frs',
            'cost',
            'warranty'
        ];

        $allowedFilters = [
            'id',
            'uuid',
            'shop_id',
            'category_id',
            'name',
            'en_name',
            'price',
            'image',
            'quantity',
            'description',
            'en_description',
            'created_at',
            'updated_at',
            AllowedFilter::custom('vendor_products', new VendorProductsFilter)->default(auth()->user()),
            AllowedFilter::custom('has_offers', new ProductWithOfferFilter),
            AllowedFilter::custom('deal_of_the_day', new DealOfTheDayFilter),
            AllowedFilter::custom('top_sell', new TopSellProductsFilter),
            AllowedFilter::custom('search', new ProductSearchFilter),
            AllowedFilter::custom('vendor_top_sell', new VendorTopSellProductsFilter),
        ];

        $allowedSorts = [
            'updated_at',
            'created_at',
            'price',
        ];

        $allowedIncludes = [
            'shop',
            'options',
            'category',
            'images',
            'favourites',
            'rates',
        ];


        $perPage = $request->limit  ? $request->limit : 10;

        if (Auth::user() != null && Auth::user()->userable_type == 'App\Models\Vendor' || Auth::user() != null && Auth::user()->userable_type == 'App\Models\Admin'){
            return QueryBuilder::for(Product::class)
                ->select($defaultSelect)
                ->allowedFilters($allowedFilters)
                ->allowedSorts($allowedSorts)
                ->allowedIncludes($allowedIncludes)
                ->defaultSort($defaultSort)
                ->with(['shop','category','offers'])
                ->paginate($perPage);

        }else
        {
            return QueryBuilder::for(Product::class)
                ->select($defaultSelect)
                ->where('stop', 0)
                ->allowedFilters($allowedFilters)
                ->allowedSorts($allowedSorts)
                ->allowedIncludes($allowedIncludes)
                ->defaultSort($defaultSort)
                ->with(['shop','category','offers'])
                ->paginate($perPage);
        }
    }

}
