<?php


namespace App\Collections;


use App\Filters\CustomerFilter;
use App\Filters\VendorRateFilter;
use App\Models\Offer;
use App\Models\Rate;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class RatesCollection
{
    public static function collection (Request $request) {

        $defaultSort = 'created_at';

        $defaultSelect = [
            'id',
            'customer_id',
            'product_id',
            'rate',
            'comment',
            'created_at',
            'updated_at',
        ];

        $allowedFilters = [
            'id',
            'customer_id',
            'product_id',
            'rate',
            'created_at', 
            'updated_at',
            AllowedFilter::custom('customer_rates', new CustomerFilter)->default(auth()->user()),
            AllowedFilter::custom('vendor_rate', new VendorRateFilter)->default(auth()->user())
        ];

        $allowedSorts = [
            'updated_at',
            'created_at',
        ];

        $allowedIncludes = [
            'customer',
            'product'
        ];


        $perPage = $request->limit  ? $request->limit : 100;

        return QueryBuilder::for(Rate::class)
            ->select($defaultSelect)
            ->allowedFilters($allowedFilters)
            ->allowedSorts($allowedSorts)
            ->allowedIncludes($allowedIncludes)
            ->defaultSort($defaultSort)
            ->with('customer')
            ->with('product')
            ->paginate($perPage);
    }

}
