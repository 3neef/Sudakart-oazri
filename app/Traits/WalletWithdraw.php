<?php

/** @noinspection PhpUndefinedClassInspection */

namespace App\Traits;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use App\Notifications\SmsCodeNotification;
use App\Services\CodesServices;
use App\Services\OrderServices;
use App\Services\WalletServices;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait WalletWithdraw
{
    protected static function boot()
    {
        parent::boot();
        self::updated(function ($model) {
            if ($model->status == 'returned') {
                $order_id = $model->order_id;
                $product = Product::findorfail($model->product_id);
                $coupon = Coupon::where('id', $model->coupon_id )->where('stop', 0)->first();
                    if($coupon){
                        $discount = $coupon->discount;
                    }else{
                        $discount = 0 ;
                    }
                    $order_product = OrderProduct::findorfail($model->id);
                    $increment = OrderServices::returnoptions($order_product, $order_product->options );
                    $price = $model->price + $increment - $discount * ($model->price + $increment);
                    $payment_amount =  $price * $model->quantity;
                    $commission = $product->category->commission;
                    $amount = $commission * $payment_amount;
                    $user_id = $product->shop->vendor->user->id;
                $wallet = User::findOrFail($user_id)->userable->wallet;
                $notes = "deposit the commission for the returnd product";
                $payment_notes = "refunded from the vendor for the returnd product";
                DB::transaction(function () use ($wallet, $amount, $notes,$order_id,$payment_amount,$payment_notes,$price) {
                    WalletServices::deposit($wallet, $amount, $notes, $order_id, null);
                    WalletServices::refund($wallet, $payment_amount, $payment_notes, $order_id, null);
                    $order = Order::findorfail($order_id);
                    $order->update([
                        'total'=> $order->total - $price,
                        'amount'=> $order->amount - $price
                    ]);
                });
            }
        });
    }
}
