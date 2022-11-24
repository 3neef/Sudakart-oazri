<?php


namespace App\Collections;


use App\Models\Attribute;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class AttributesCollection
{
    public static function collection (Request $request) {

        $defaultSort = '-created_at';

        $defaultSelect = [
            'id',
            'name',
            'en_name',
            'created_at',
            'updated_at',
        ];

        $allowedFilters = [
            'name',
            'id',
            'uuid'
        ];

        $allowedSorts = [
            'updated_at',
            'created_at',
        ];

        $allowedIncludes = [
            'options',
        ];

        $perPage = $request->limit  ? $request->limit : 100;

        return QueryBuilder::for(Attribute::class)
            ->select($defaultSelect)
            ->with('options')
            ->allowedFilters($allowedFilters)
            ->allowedIncludes($allowedIncludes)
            ->allowedSorts($allowedSorts)
            ->defaultSort($defaultSort)
            ->paginate($perPage);
    }

}
