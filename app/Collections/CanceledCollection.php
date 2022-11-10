<?php


namespace App\Collections;


use App\Filters\DriverOrdersFilter;
use App\Models\CanceledOrder;
use App\Models\ReturnedProducts;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CanceledCollection
{
    public static function collection (Request $request) {

        $defaultSort = '-created_at';

        $defaultSelect = [
            'id',
            'order_id',
            'status',
            'created_at',
            'updated_at',
        ];

        $allowedFilters = [
            'order_id',
            'status',
            'created_at',
            'updated_at',
            // AllowedFilter::custom('driver_deliveries', new DriverOrdersFilter)->default(auth()->user())
        ];

        $allowedSorts = [
            'order_id',
            'updated_at',
            'created_at',
        ];

        $allowedIncludes = [
            'orderProduct.product',
        ];


        $perPage = $request->limit  ? $request->limit : 100;

        return QueryBuilder::for(CanceledOrder::class)
            ->select($defaultSelect)
            ->allowedFilters($allowedFilters)
            ->allowedSorts($allowedSorts)
            ->allowedIncludes($allowedIncludes)
            ->defaultSort($defaultSort)
            ->paginate($perPage);
    }

}
