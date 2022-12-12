<?php


namespace App\Filters;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class ProductSearchFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if ($value) {
            $query->whereRaw('(name like ? or en_name like ? or sku like ?)',["%".$value."%","%".$value."%","%".$value."%"]);
        }
    }
}
