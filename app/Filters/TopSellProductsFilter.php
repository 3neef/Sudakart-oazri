<?php


namespace App\Filters;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class TopSellProductsFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if ($value) {
            $query->whereHas('orders')->withCount('orders');
        }
    }
}
