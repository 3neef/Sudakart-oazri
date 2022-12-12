<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price'
    ];

    public function order () {
        return $this->hasMany(Order::class);
    }

    public function city () {
        return $this->belongsToMany(City::class,'cities_delivery_methods');
        // ->withPivot('delivery_amount', 'city_id', 'delivery_method_id');
    }
}
