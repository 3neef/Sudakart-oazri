<?php


namespace App\Collections;


use App\Filters\AdvertisementsFilter;
use App\Models\Advertisement;
use App\Models\Article;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class AdvertisementsCollection
{
    public static function collection (Request $request) {

        $defaultSort = '-created_at';

        $defaultSelect = [
            'id',
            'title',
            'media',
            'description',
            'url',
            'expire_at',
            'created_at',
            'updated_at',
        ];

        $allowedFilters = [
            'id',
            'title',
            'media',
            'description',
            'url',
            'expire_at',
            'created_at',
            'updated_at',
            AllowedFilter::custom('active_ads', new AdvertisementsFilter)->default(auth()->user())
        ];

        $allowedSorts = [
            'updated_at',
            'created_at',
        ];

        $perPage = $request->limit  ? $request->limit : 100;

        return QueryBuilder::for(Advertisement::class)
            ->select($defaultSelect)
            ->allowedFilters($allowedFilters)
            ->allowedSorts($allowedSorts)
            ->defaultSort($defaultSort)
            ->paginate($perPage);
    }

}
