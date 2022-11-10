<?php


namespace App\Services;


use App\Models\Transaction;

class TransactionsServices
{
    public static function create ($type, $amount, $notes, $wallet, $order_id, $product_id) {
        // return dd($wallet);
        if ($wallet == null) {
            Transaction::create([
                    'type' => $type,
                    'amount' => $amount,
                    'notes' => $notes,
                    'order_id' => $order_id,
                    'product_id' => $product_id
                ]);
        }
        else {
            $wallet->transactions()->create([
                'type' => $type,
                'amount' => $amount,
                'notes' => $notes,
                'order_id' => $order_id,
                'product_id' => $product_id
            ]);
        }
    }
}
