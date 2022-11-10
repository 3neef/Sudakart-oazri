<?php


namespace App\Filters;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class VendorShopFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if ($value) {
            if ($value->userable_type == 'App\Models\Vendor'){
                $query->where('vendor_id', $value->userable->id);
            }
        }
    }
}
