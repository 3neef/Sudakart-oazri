<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_id',
        'name',
        'en_name'
    ];

    public function state () {
        return $this->belongsTo(State::class);
    }

    public function market () {
        return $this->hasMany(Market::class);
    }

    public function delivery () {
        return $this->belongsToMany(DeliveryMethod::class, 'cities_delivery_methods', 'city_id', 'delivery_method_id')
        ->withPivot('delivery_amount');
    }
}
