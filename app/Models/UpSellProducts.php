<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UpSellProducts extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'up_sell_id',
        'product_id'
    ];

    public function upSell () {
        return $this->belongsTo(UpSell::class, 'up_sell_id');
    }

    public function product () {
        return $this->belongsTo(Product::class);
    }
}
