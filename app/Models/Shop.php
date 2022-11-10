<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use HasFactory, HasUuid, SoftDeletes;

    protected $fillable = [
        'vendor_id',
        'market_id',
        // 'city_id',
        'shop_name',
        'shop_en_name',
        'shop_address',
        'lat',
        'long',
    ];

    public function categories () {
        return $this->belongsToMany(Category::class, 'shop_categories');
    }

    // protected $with = ['products'];

    public function vendor () {
        return $this->belongsTo(Vendor::class);
    }

    public function products () {
        return $this->hasMany(Product::class);
    }

    public function offers () {
        return $this->hasMany(Offer::class);
    }

    public function coupons () {
        return $this->hasMany(Coupon::class);
    }
}
