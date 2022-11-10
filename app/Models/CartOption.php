<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartOption extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id', 'product_option_id'];

    public function cart () {
        return $this->belongsTo(Cart::class);
    }
}
