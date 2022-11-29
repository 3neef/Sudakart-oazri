<?php

namespace App\Models;

use App\Services\OrderServices;
use App\Traits\WalletWithdraw;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory, WalletWithdraw;

    protected $fillable = [
        'order_id',
        // 'offer_id',
        'coupon_id',
        'up_sell_id',
        'product_id',
        'quantity',
        'price',
        'shop_id',
        'driver_id',
        'status',
        'approved'
    ];

    protected $appends = ['start', 'end', 'total'];
    protected $with = ['product'];
    protected function getStartAttribute()
    { 
        return (object) array('lat' => '15.60649592111121', 'long' => '32.52949785224432');
    }
    protected function getTotalAttribute()
    { 
        $total = $this->price * $this->quantity;
        return $total;
    }

    protected function getEndAttribute()
    { 
        $shop = Product::findorfail($this->product_id)->shop;
        if($shop){
            return (object) array('lat' => $shop->lat, 'long' => $shop->long);
        }else{
            return null;
        }
    }
    public function product () {
        return $this->belongsTo(Product::class)->withTrashed();
    }

    public function shop () {
        return $this->belongsTo(Shop::class);
    }

    public function order () {
        return $this->belongsTo(Order::class);
    }

    public function offer () {
        return $this->belongsTo(Offer::class);
    }

    public function coupon () {
        return $this->belongsTo(Coupon::class);
    }

    public function upselling () {
        return $this->belongsTo(UpSell::class);
    }

    public function options () {
        return $this->hasMany(OrderProductOption::class);
    }

    public function driver () {
        return $this->belongsTo(Driver::class);
    }
}
