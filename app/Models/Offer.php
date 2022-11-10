<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'name',
        'en_name',
        'discount',
        'expire_at'
    ];
		
    public function shop () {
        return $this->belongsTo(Shop::class);
    }
	
	protected $with = ['product_offer'];

    // public function products () {
    //     return $this->belongsToMany(Product::class, 'product_offers');
    // }
	
    public function product_offer () {
        return $this->hasMany(ProductOffer::class,'offer_id','id')->with('product');
    }
}
