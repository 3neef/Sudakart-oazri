<?php

namespace App\Models;

use App\Services\OrderServices;
use App\Traits\HasUuid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'type',
        'amount',
        'notes',
        'order_id',
        'product_id'
    ];

    public function operator () {
        return $this->morphTo();
    }

    public function wallet () {
        return $this->belongsTo(Wallet::class);
    }

    public function product () {
        return $this->belongsTo(Product::class);
    }

    protected $appends = ['info'];
    protected function getInfoAttribute()
    { 
        if ($this->product != null){
            $productOffer = ProductOffer::where('product_id', $this->product->id)->first();
            if($productOffer){
                $offer = Offer::where('id', $productOffer->offer_id)
                    ->first();
                    $discount = $offer->discount;
            }else{
                $discount = 0;
            }

            $order_product = OrderProduct::where('product_id', $this->product->id)->where('order_id', $this->order_id)->first();

            $quantity = $order_product->quantity;
            $commission = $this->product->category->commission;
            if ($order_product->coupon_id != NULL){
                $coupon = OrderServices::hasCoupon($order_product);
            }else{
                $coupon = 0;
            }

            $increment = OrderServices::returnoptions($order_product, $order_product->options);

            if ($this->type == 'withdraw' || $this->type == 'refund' || $this->type == 'payment'){
                return (object) array('offer_discount' => $discount, 'quantity' => $quantity, 'coupon' => $coupon, 'increment' => $increment, 'commission'=> $commission);

            }else{
                return null;
            }
        } 
    }
}
