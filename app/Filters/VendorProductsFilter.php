<?php


namespace App\Filters;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class VendorProductsFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if ($value) {
            if (auth()->user()->userable_type == 'App\Models\Vendor'){
                $query->where('shop_id', auth()->user()->userable->shop->id)->orderBy('views', 'desc');
            }
        }
    }
}
