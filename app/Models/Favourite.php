<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'product_id'];

    public function customer () {
        return $this->belongsTo(Customer::class);
    }

    public function product () {
        return $this->belongsTo(Product::class);
    }

    public function isFavourite ($product_id) {
        if (auth()->user()) {
            $favourite = Favourite::where('product_id',$product_id)->where('customer_id', auth()->user()->userable->id)->first();
            if ($favourite) {
                return true;
            }
        }
        return false;
    }
}
