<?php


namespace App\Collections;


use App\Models\Article;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ArticlesCollection
{
    public static function collection (Request $request) {

        $defaultSort = '-created_at';

        $defaultSelect = [
            'id',
			'shop_id',
            'title',
            'content',
            'created_at',
            'updated_at',
        ];

        $allowedFilters = [
            'title',
            'id'
        ];

        $allowedSorts = [
            'updated_at',
            'created_at',
        ];

        $perPage = $request->limit  ? $request->limit : 100;

        return QueryBuilder::for(Article::class)
            ->select($defaultSelect)
            ->allowedFilters($allowedFilters)
            ->allowedSorts($allowedSorts)
            ->defaultSort($defaultSort)
            ->where('approved', 1)
            ->with('shop')
            ->with('comments')
            ->with('products')
            ->paginate($perPage);
    }

}
