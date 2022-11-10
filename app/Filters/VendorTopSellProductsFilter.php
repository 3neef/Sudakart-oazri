<?php


namespace App\Filters;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class VendorTopSellProductsFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if ($value) {
            if ($value->userable_type == 'App\Models\Vendor'){
                $query->whereHas('orders')->withCount('orders');
            }
        }
    }
}
