<?php


namespace App\Filters;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class ProductWithOfferFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if ($value) {
            $query->whereHas('offers', function ($q) {
                $q->whereDate('expire_at', '>=' , today());
            });
        }
    }
}
