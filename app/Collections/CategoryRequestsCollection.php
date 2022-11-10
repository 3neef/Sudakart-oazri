<?php


namespace App\Collections;


use App\Models\CategoryRequest;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CategoryRequestCollection
{
    public static function collection (Request $request) {

        $defaultSort = '-created_at';

        $defaultSelect = [
            'id',
            'shop_id',
            'category_id',
            'reason',
            'approved',
        ];

        $allowedFilters = [
            'id',
            'shop_id',
            'category_id',
            'reason',
            'approved',
        ];

        $allowedSorts = [
            'updated_at',
            'created_at',
        ];

        $allowedIncludes = [
            'shop',
            'category',
        
        ];

        $perPage = $request->limit  ? $request->limit : 100;

        return QueryBuilder::for(CategoryRequest::class)
            ->select($defaultSelect)
            ->allowedFilters($allowedFilters)
            ->allowedIncludes($allowedIncludes)
            ->allowedSorts($allowedSorts)
            ->defaultSort($defaultSort)
            ->paginate($perPage);
    }

}
