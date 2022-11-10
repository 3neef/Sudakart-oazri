<?php

/** @noinspection PhpUndefinedClassInspection */

namespace App\Traits;

use App\Models\Coupon;
use App\Models\DeliveryMethod;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use App\Services\NotificationServices;
use App\Services\OrderServices;
use App\Services\TransactionsServices;
use App\Services\WalletServices;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait Notification
{
    protected static function boot()
    {
        parent::boot();
        self::updated(function ($model) {
            if ($model->approved == 1) {
                $order_id = $model->id;
                // $driver = User::where('userable_id', $model->delivered_by)->where('userable_type', 'App\Models\Driver')->first();
                // $wallet = $driver->userable->wallet;
                // $method = DeliveryMethod::findOrFail($model->delivery_method_id);
                // $amount = $method->price * 0.1;
                // $payment_amount = $method->price;
                // $notes = "commission withdrawal from driver";
                // $payment_notes = "Driver order payment";
                $ordersProducts  = OrderProduct::where('order_id', $model->id)
                    ->where('approved', 0)
                    ->distinct('product_id')
                    ->pluck('product_id');
                $products = Product::whereIn('id', $ordersProducts)->get();
                // $product_id = null;
                // if ($products->count() >= 1) {
                //     WalletServices::withdraw($wallet, $amount, $notes, $order_id, $product_id);
                //     WalletServices::payment($wallet, $payment_amount, $payment_notes, $order_id, $product_id);
                //     Log::info("driver transaction went through");
                // }
                foreach ($products as $product) {
                    $product_id = $product->id;
                    $orders_product = OrderProduct::where('order_id', $model->id)
                        ->where('product_id', $product->id)->first();
                    $commission = $product->category->commission;
                    $coupon = Coupon::where('id', $orders_product->coupon_id)->where('shop_id',  $orders_product->shop_id )->where('stop', 0)->first();
                    if ($coupon) {
                        $discount = $coupon->discount;
                    } else {
                        $discount = 0;
                    }
                    $increment = OrderServices::returnoptions($orders_product, $orders_product->options);
                    $price = $orders_product->price + $increment - $discount * ($orders_product->price + $increment);
                    $payment_amount =  $price * $orders_product->quantity;
                    $amount = $commission * $payment_amount;
                    $user_id = $product->shop->vendor->user->id;
                    $wallet = User::findOrFail($user_id)->userable->wallet;
                    $notes = "commission withdrawal from vendor";
                    $payment_notes = "vendor order product payment";
                    DB::transaction(function () use ($wallet, $amount, $notes, $order_id, $payment_amount, $payment_notes, $product_id) {
                        WalletServices::withdraw($wallet, $amount, $notes, $order_id, $product_id);
                        WalletServices::payment($wallet, $payment_amount, $payment_notes, $order_id, $product_id);
                    });
                    $orders_product->update(['approved' => 1]);
                }
            }
        });
        self::updated(function ($model) {
            $id = $model->customer_id;
            $user = User::where('userable_id', $id)->where('userable_type', 'App\Models\Customer')->first();
            $device_token = User::where('userable_id', $id)->where('userable_type', 'App\Models\Customer')->pluck('fcm_token');
            
            if ($model->status == 'in progress') {
                if ($user->fcm_token != null){
                $message = [
                        'title' => "Order Updated",
                        'body' => "you order is in progress!",
                    ];
                    NotificationServices::sendNotification($device_token, $message);
                }

                    DB::table('notifications')->insert(
                        array(
                            'title' => 'Order Updated',
                            'message' => 'you order is in progress!',
                            'type' => 'order',
                            'item_id' => $model->id,
                            'user_id' => $user->id,
                            'created_at' => now()
                        )
                    );
                }
                if ($model->status == 'completed') {
                    if ($user->fcm_token != null){
                    $message = [
                        'title' => "Order Updated",
                        'body' => "you order is delivered!",
                    ];
                    NotificationServices::sendNotification($device_token, $message);
                    }
                    DB::table('notifications')->insert(
                        array(
                            'title' => 'Order Updated',
                            'message' => 'you order is delivered!',
                            'type' => 'order',
                            'item_id' => $model->id,
                            'user_id' => $user->id,
                            'created_at' => now()
                        )
                    );
                }
            // if($model->status == 'completed'){
            //     $message = [
            //         'title' => "Order Updated",
            //         'body' => "you order is completed!",
            //     ];
            //     NotificationServices::sendNotification($device_token, $message);
            //     DB::table('notifications')->insert(
            //         array(
            //             'title' => 'Order Updated',
            //             'message' => 'you order is completed!',
            //             'type' => 'order',
            //             'item_id' => $model->id,
            //             'user_id' => $user_id,
            //             'created_at' => now()
            //             )
            //         );
            // }
        });
    }
}
