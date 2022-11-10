<?php


namespace App\Collections;


use App\Filters\DriverOrdersFilter;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class OrdersProductsCollection
{
    public static function collection (Request $request) {

        $defaultSort = '-created_at';

        $defaultSelect = [
            'id',
            'order_id',
            // 'offer_id',
            'coupon_id',
            'up_sell_id',
            'product_id',
            'quantity',
            'price',
            'driver_id',
            'status',
            'approved',
            'taken_by',
            'created_at',
            'updated_at',
        ];

        $allowedFilters = [
            'order_id',
            // 'offer_id',
            'coupon_id',
            'up_sell_id',
            'product_id',
            'quantity',
            'price',
            'driver_id',
            'status',
            'created_at',
            'updated_at',
            AllowedFilter::custom('driver_deliveries', new DriverOrdersFilter)->default(auth()->user())
        ];

        $allowedSorts = [
            'updated_at',
            'created_at',
        ];

        $allowedIncludes = [
            'order',
            'product.shop.vendor',
            'offers',
            'coupons',
            'upselling',
            'driver'
        ];


        $perPage = $request->limit  ? $request->limit : 10;

        return QueryBuilder::for(OrderProduct::class)
            ->select($defaultSelect)
            ->allowedFilters($allowedFilters)
            ->allowedSorts($allowedSorts)
            ->allowedIncludes($allowedIncludes)
            ->defaultSort($defaultSort)
            ->paginate($perPage);
    }

}
