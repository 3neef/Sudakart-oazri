<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable  = [
        'shop_id',
        'code',
        'discount',
        'expire_at',
        'stop'
    ];

    public function shop () {
        return $this->belongsTo(Shop::class);
    }

    public static function couponExiests($coupon)
    {
        $result = Coupon::where('code',$coupon)
                ->where('expire_at','>=',today())
                ->where('stop',0)
                ->limit(1)
                ->exists();
        return $result;
    }

    public static function couponMatch($coupon,$shop_id)
    {
        $result = Coupon::where('code',$coupon)
                ->where('expire_at','>=',today())
                ->where('stop',0)
                ->where('shop_id',$shop_id)
                ->get();
        return $result;
    }
}
