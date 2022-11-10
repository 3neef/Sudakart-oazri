<?php


namespace App\Collections;


use App\Filters\VendorTransactionsFilter;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TransactionsCollection
{
    public static function collection (Request $request) {

        $defaultSort = '-created_at';

        $defaultSelect = [
            'id',
			'uuid',
            'operator_type',
            'wallet_id',
            'type',
            'amount',
            'notes',
            'order_id',
            'product_id',
            'created_at',
            'updated_at',
        ];

        $allowedFilters = [
            'uuid',
            'operator_type',
            'wallet_id',
            'type',
            'amount',
            'notes',
            'created_at',
            'updated_at',
            AllowedFilter::custom('vendor_transactions', new VendorTransactionsFilter)->default(auth()->user())
        ];

        $allowedSorts = [
            'updated_at',
            'created_at',
        ];

        $allowedIncludes = [
            'operator',
        ];


        $perPage = $request->limit  ? $request->limit : 10;

        return QueryBuilder::for(Transaction::class)
            ->select($defaultSelect)
            ->allowedFilters($allowedFilters)
            ->allowedSorts($allowedSorts)
            ->allowedIncludes($allowedIncludes)
            ->defaultSort($defaultSort)
            ->with('operator.accountable')
            ->with('product')
            ->paginate($perPage);
    }

}
