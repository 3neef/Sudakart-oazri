<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WalletServices
{
    public static function create (Model $model) {
        $model->wallet()->create();
    }

    public static function compare ($wallet, $amount) {
        if ($wallet->balance >= $amount) {
            return true;
        }
        return false;
    }

    public static function deposit ($wallet, $amount, $notes = null, $order_id, $product_id) {
        DB::transaction(function () use ($wallet, $amount, $notes, $order_id, $product_id) {
            $wallet->update(['balance' => $wallet->balance + $amount]);
            TransactionsServices::create('deposit', $amount, $notes, $wallet, $order_id, $product_id);
        });
        return true;
    }
    public static function payment ($wallet, $amount, $notes = null, $order_id, $product_id) {
        DB::transaction(function () use ($wallet, $amount, $notes, $order_id, $product_id) {
            TransactionsServices::create('payment', $amount, $notes, $wallet, $order_id, $product_id);
        });
        return true;
    }

    public static function refund ($wallet, $amount, $notes = null, $order_id, $product_id) {
        DB::transaction(function () use ($wallet, $amount, $notes, $order_id, $product_id) {
            TransactionsServices::create('refund', $amount, $notes, $wallet, $order_id, $product_id);
        });
        return true;
    }

    public static function withdraw ($wallet, $amount, $notes = null, $order_id, $product_id) {
        if (self::compare($wallet, $amount)) {
            DB::transaction(function () use ($wallet, $amount, $notes, $order_id, $product_id) {
                $wallet->update(['balance' => $wallet->balance - $amount]);
                TransactionsServices::create('withdraw', $amount, $notes, $wallet, $order_id, $product_id);
            });
            return true;
        }
    }

}
