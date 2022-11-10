<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UpSell extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'shop_id',
        'discount'
    ];

    public function shop () {
        return $this->belongsTo(Shop::class);
    }

    public function products () {
        return $this->hasMany(UpSellProducts::class);
    }
}
