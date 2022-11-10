<?php


namespace App\Collections;


use App\Models\Expense;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ExpensesCollection
{
    public static function collection (Request $request) {

        $defaultSort = '-created_at';

        $defaultSelect = [
            'id',
            'expense_type_id',
            'price',
            'image',
            'expense_date',
            'created_at',
            'updated_at',
        ];

        $allowedFilters = [
            'expense_type_id',
            'price',
            'expense_date',
        ];

        $allowedSorts = [
            'updated_at',
            'created_at',
        ];

        $allowedIncludes = [
            //
        ];

        $perPage = $request->limit  ? $request->limit : 10;

        return QueryBuilder::for(Expense::class)
            ->select($defaultSelect)
            ->allowedFilters($allowedFilters)
            ->allowedIncludes($allowedIncludes)
            ->allowedSorts($allowedSorts)
            ->defaultSort($defaultSort)
            ->paginate($perPage);
    }

}
