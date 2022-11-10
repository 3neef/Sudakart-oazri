<?php


namespace App\Collections;


use App\Models\Coupon;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Auth;

class CouponsCollection
{
    public static function collection (Request $request) {

        $defaultSort = '-created_at';

        $defaultSelect = [
            'id',
            'shop_id',
            'code',
            'discount',
            'expire_at',
            'created_at',
            'updated_at',
            'stop',
        ];

        $allowedFilters = [
            'id',
            'shop_id',
            'code',
            'discount',
            'expire_at',
            'created_at',
            'updated_at',
            'stop',
        ];

        $allowedSorts = [
            'updated_at',
            'created_at',
        ];


        $perPage = $request->limit  ? $request->limit : 10;

        if (Auth::user() != null && Auth::user()->userable_type == 'App\Models\Vendor') {
            return QueryBuilder::for(Coupon::class)
            ->select($defaultSelect)
            ->allowedFilters($allowedFilters)
            ->allowedSorts($allowedSorts)
            ->where('shop_id', auth()->user()->userable->shop->id)
            ->defaultSort($defaultSort)
            ->paginate($perPage);
        } else {
            return QueryBuilder::for(Coupon::class)
            ->select($defaultSelect)
            ->allowedFilters($allowedFilters)
            ->allowedSorts($allowedSorts)
            ->defaultSort($defaultSort)
            ->paginate($perPage);
        }
    }

}
