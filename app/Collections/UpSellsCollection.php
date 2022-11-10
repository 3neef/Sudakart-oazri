<?php


namespace App\Collections;


use App\Models\UpSell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;

class UpSellsCollection
{
    public static function collection (Request $request) {

        $defaultSort = '-created_at';

        $defaultSelect = [
            'id',
            'shop_id',
            'discount',
            'created_at',
            'updated_at',
        ];

        $allowedFilters = [
            'shop_id',
            'id',
        ];

        $allowedSorts = [
            'updated_at',
            'created_at',
        ];

        $allowedIncludes = [
            'products',
        ];

        $perPage = $request->limit  ? $request->limit : 10;

        if (Auth::user() != null && Auth::user()->userable_type == 'App\Models\Vendor') {
            return QueryBuilder::for(UpSell::class)
            ->select($defaultSelect)
            ->allowedFilters($allowedFilters)
            ->allowedIncludes($allowedIncludes)
            ->allowedSorts($allowedSorts)
            ->where('shop_id', auth()->user()->userable->shop->id)
            ->defaultSort($defaultSort)
            ->with('products.product')
            ->paginate($perPage);
        } else {
            return QueryBuilder::for(UpSell::class)
            ->select($defaultSelect)
            ->allowedFilters($allowedFilters)
            ->allowedIncludes($allowedIncludes)
            ->allowedSorts($allowedSorts)
            ->defaultSort($defaultSort)
            ->with('products.product')
            ->paginate($perPage);
        }
    }

}
