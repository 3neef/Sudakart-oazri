<?php


namespace App\Collections;


use App\Filters\DriverOrdersFilter;
use App\Models\ReturnedProducts;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ReturnedCollection
{
    public static function collection (Request $request) {

        $defaultSort = '-created_at';

        $defaultSelect = [
            'id',
            'order_product_id',
            'driver_id',
            'order_id',
            'reason',
            'status',
            'delivery_ref_id',
            'region_id',
            'created_at',
            'updated_at',
        ];

        $allowedFilters = [
            'order_product_id',
            'driver_id',
            'reason',
            'status',
            'created_at',
            'updated_at',
            AllowedFilter::custom('driver_deliveries', new DriverOrdersFilter)->default(auth()->user())
        ];

        $allowedSorts = [
            'order_product_id',
            'updated_at',
            'created_at',
        ];

        $allowedIncludes = [
            'driver',
            'orderProduct.product',
        ];


        $perPage = $request->limit  ? $request->limit : 10;

        return QueryBuilder::for(ReturnedProducts::class)
            ->select($defaultSelect)
            ->allowedFilters($allowedFilters)
            ->allowedSorts($allowedSorts)
            ->allowedIncludes($allowedIncludes)
            ->defaultSort($defaultSort)
            ->with('product')
            ->paginate($perPage);
    }

}
