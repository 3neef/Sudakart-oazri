<?php


namespace App\Collections;


use App\Models\Offer;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Auth;

class OffersCollection
{
    public static function collection (Request $request) {

        $defaultSort = '-created_at';

        $defaultSelect = [
            'id',
            'shop_id',
            'name',
            'en_name',
            'discount',
            'expire_at',
            'created_at',
            'updated_at',
        ];

        $allowedFilters = [
            'id',
            'shop_id',
            'name',
            'en_name',
            'discount',
            'expire_at',
            'created_at',
            'updated_at',
        ];

        $allowedSorts = [
            'updated_at',
            'created_at',
        ];

        $allowedIncludes = [
            'shop',
            'products'
        ];


        $perPage = $request->limit  ? $request->limit : 10;

        if (Auth::user() != null && Auth::user()->userable_type == 'App\Models\Vendor') {
            return QueryBuilder::for(Offer::class)
                ->select($defaultSelect)
                ->allowedFilters($allowedFilters)
                ->allowedSorts($allowedSorts)
                ->where('shop_id', auth()->user()->userable->shop->id)
                ->allowedIncludes($allowedIncludes)
                ->defaultSort($defaultSort)
                ->paginate($perPage);
        } else {
            return QueryBuilder::for(Offer::class)
                ->select($defaultSelect)
                ->allowedFilters($allowedFilters)
                ->allowedSorts($allowedSorts)
                ->allowedIncludes($allowedIncludes)
                ->defaultSort($defaultSort)
                ->paginate($perPage);
        }
    }

}
