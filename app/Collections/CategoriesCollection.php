<?php


namespace App\Collections;


use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CategoriesCollection
{
    public static function collection (Request $request) {

        $defaultSort = '-created_at';

        $defaultSelect = [
            'id',
            'uuid',
            'name',
            'en_name',
            'parent_id',
            'commission',
            'image',
            'color',
            'created_at',
            'updated_at',
        ];

        $allowedFilters = [
            'id',
            'uuid',
            'name',
            'en_name',
            'parent_id',
            'commission',
            'image',
            'color',
            'created_at',
            'updated_at',
        ];

        $allowedSorts = [
            'updated_at',
            'created_at',
        ];

        $allowedIncludes = [
            'shops',
            'products',
            'parent',
            'children'
        ];

        $perPage = $request->limit  ? $request->limit : 10;

        return QueryBuilder::for(Category::class)
            ->select($defaultSelect)
            ->allowedFilters($allowedFilters)
            ->allowedIncludes($allowedIncludes)
            ->allowedSorts($allowedSorts)
            ->defaultSort($defaultSort)
            ->paginate($perPage);
    }

}
