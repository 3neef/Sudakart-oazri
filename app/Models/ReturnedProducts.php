<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReturnedProducts extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_product_id',
        'driver_id',
        'order_id',
        'reason',
        'status',
        'delivery_ref_id',
        'region_id'
    ];

    public function driver () {
        return $this->belongsTo(Driver::class);
    }

    public function orderProduct () {
        return $this->belongsTo(OrderProduct::class)->withTrashed();
    }
    
    public function product () {
        return $this->belongsTo(Product::class, 'order_product_id');
    }
}
