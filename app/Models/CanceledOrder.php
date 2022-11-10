<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanceledOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'status'
    ];

    public function order () {
        return $this->belongsTo(Order::class);
    }

    public function orderProduct () {
        return $this->belongsTo(OrderProduct::class);
    }
}
