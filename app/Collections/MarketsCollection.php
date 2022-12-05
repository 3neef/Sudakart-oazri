<?php


namespace App\Collections;


use App\Models\Market;
use App\Models\Offer;
use App\Models\Rate;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class MarketsCollection
{
    public static function collection (Request $request) {

        $defaultSort = '-created_at';

        $defaultSelect = [
            'id',
            'name',
            'en_name',
            'city_id',
            'lat',
            'long',
            'created_at',
            'updated_at',
        ];

        $allowedFilters = [
            'id',
            'name',
            'lat',
            'long',
            'created_at',
            'updated_at',
        ];

        $allowedSorts = [
            'updated_at',
            'created_at',
        ];

        $allowedIncludes = [
            'city',
            'shops'
        ];


        $perPage = $request->limit  ? $request->limit : 10;

        return QueryBuilder::for(Market::class)
            ->select($defaultSelect)
            ->allowedFilters($allowedFilters)
            ->allowedSorts($allowedSorts)
            ->with('city')
            ->allowedIncludes($allowedIncludes)
            ->defaultSort($defaultSort)
            ->paginate($perPage);
    }

}
