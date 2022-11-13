<?php


namespace App\Collections;


use App\Filters\CustomerFilter;
use App\Filters\DriverOrdersFilter;
use App\Filters\InboundFilter;
use App\Models\Order;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class OrdersCollection
{
    public static function collection (Request $request) {

        $defaultSort = '-created_at';

        $defaultSelect = [
            'id',
            'customer_id',
            // 'delivery_method_id',
            'delivered_by',
            'amount',
            'delivery_amount',
            'total',
            'profit',
            'delivered_at',
            'payment_method',
            'address',
            'lat',
            'long',
            'gift',
            'status',
            'approved',
            'handover',
            'created_at',
            'updated_at'
        ];

        $allowedFilters = [
            'id',
            'uuid',
            'customer_id',
            'delivery_method_id',
            'delivered_by',
            'amount',
            'delivery_amount',
            'total',
            'profit',
            'delivered_at',
            'payment_method',
            'address',
            'lat',
            'long',
            'gift',
            'status',
            'created_at',
            'updated_at',
            AllowedFilter::custom('driver_deliveries', new InboundFilter)->default(auth()->user()),
            AllowedFilter::custom('customer_orders', new CustomerFilter)->default(auth()->user())
        ];

        $allowedSorts = [
            'updated_at',
            'created_at',
            'amount',
            'delivery_amount',
            'total',
            'profit',
        ];

        $allowedIncludes = [
            'customer',
            'options',
            'products',
        ];


        $perPage = $request->limit  ? $request->limit : 10;

        return QueryBuilder::for(Order::class)
            ->select($defaultSelect)
            ->allowedFilters($allowedFilters)
            ->allowedSorts($allowedSorts)
            ->with('products')
            // ->where('delivered_by', auth()->user()->userable_id)
            ->allowedIncludes($allowedIncludes)
            ->defaultSort($defaultSort)
            ->paginate($perPage);
    }

}
