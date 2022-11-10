<?php


namespace App\Filters;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class AdvertisementsFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if (!$value || $value->userable != 'App\Models\Admin') {
            $query->whereDate('expire_at', '>=' , today());
        }
    }
}
