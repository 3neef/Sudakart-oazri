<?php


namespace App\Filters;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;
use App\Models\Product;

class VendorRateFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        
        if ($value) {
            if ($value->userable_type == 'App\Models\Vendor'){
                $query->whereHas('product', function ($q) {
                        $shop_id = auth()->user()->userable->shop->id;
                        $q->where('shop_id', $shop_id );
                    });
                }
        }
    }
}
