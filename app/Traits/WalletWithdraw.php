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
                $product_id = $model->product_id;

                $price = $model->price;
                $payment_amount =  $price * $model->quantity;
                $commission = $product->category->commission;
                $amount = $commission * $payment_amount;
                $user_id = $product->shop->vendor->user->id;
                $wallet = User::findOrFail($user_id)->userable->wallet;
                $notes = "إيداع عمولة المنتج المسترجع";
                $payment_notes = "إستعادة قيمة المنتج المسترجع من التاجر";
                DB::transaction(function () use ($wallet, $amount, $notes,$order_id,$payment_amount,$payment_notes,$price, $product_id) {
                    WalletServices::deposit($wallet, $amount, $notes, $order_id, $product_id);
                    WalletServices::refund($wallet, $payment_amount, $payment_notes, $order_id, $product_id);
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
