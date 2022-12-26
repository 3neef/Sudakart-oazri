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
                $products  = OrderProduct::where('order_id', $order_id)
                    ->where('approved', 0)
                    ->get();

                foreach ($products as $product) {
                    $product_id = $product->product_id;
                    $commission = $product->product->category->commission;
                    $price = $product->price;
                    $payment_amount =  $price * $product->quantity;
                    $amount = $commission * $payment_amount;
                    $user_id = $product->shop->vendor->user->id;
                    $wallet = User::findOrFail($user_id)->userable->wallet;
                    $notes = "سحب عمولة منتج من التاجر";
                    $payment_notes = "إيداع قيمة المنتج في حساب التاجر";
                    DB::transaction(function () use ($wallet, $amount, $notes, $order_id, $payment_amount, $payment_notes, $product_id) {
                        WalletServices::withdraw($wallet, $amount, $notes, $order_id, $product_id);
                        WalletServices::payment($wallet, $payment_amount, $payment_notes, $order_id, $product_id);
                    });
                    $product->update(['approved' => 1]);
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
                if ($model->status == 'canceled') {
                    if ($user->fcm_token != null){
                    $message = [
                        'title' => "الطلب ملغي",
                        'body' => "تم الغاء الطلب",
                    ];
                    NotificationServices::sendNotification($device_token, $message);
                    }
                    DB::table('notifications')->insert(
                        array(
                            'title' => "الطلب ملغي",
                            'message' => "تم الغاء الطلب",
                            'type' => 'order',
                            'item_id' => $model->id,
                            'user_id' => $user->id,
                            'created_at' => now()
                        )
                    );
                    $vendors = [];
                    foreach($model->products as $product )
                    {
                        $vendors[] = $product->shop->vendor->user->id;
                    }
                    
                    $ids = array_unique($vendors);
                    $owners = User::whereIn('id', $ids)->get();
                    foreach($owners as $owner)
                    {
                        if ($user->fcm_token != null){
                            $message = [
                                'title' => "الطلب ملغي",
                                'body' => "تم الغاء الطلب",
                            ];
                            NotificationServices::sendNotification($device_token, $message);
                            }
                            DB::table('notifications')->insert(
                                array(
                                    'title' => "الطلب ملغي",
                                    'message' => "تم الغاء الطلب",
                                    'type' => 'order',
                                    'item_id' => $model->id,
                                    'user_id' => $owner->id,
                                    'created_at' => now()
                                )
                            );
                    }
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
