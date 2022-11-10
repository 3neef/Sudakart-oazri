<?php


namespace App\Filters;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class DriverOrdersFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if ($value) {
            if ($value->userable_type == 'App\Models\Driver'){
                $query->where('taken_by',  auth()->user()->userable_id);
            }
        }
    }
}
