<?php


namespace App\Filters;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class CustomerFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if ($value) {
            if ($value->userable_type == 'App\Models\Customer'){
                $query->where('customer_id', $value->userable->id);
            }
        }
    }
}
