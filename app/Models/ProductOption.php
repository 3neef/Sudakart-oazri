<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'option_id',
        'increment',
        'quantity',
    ];

    public function option () {
        return $this->belongsTo(Option::class);
    }

    public static function attributes ($options) {
        $product_options = $options->pluck('option_id');
        return Attribute::whereHas('options', function ($query) use ($product_options){
            $query->whereIn('id', $product_options);
        })->with('options', function ($query) use ($product_options){
            $query->whereIn('id', $product_options)->with('productOptions');
        })->get();
    }
}
