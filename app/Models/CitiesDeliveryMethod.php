<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitiesDeliveryMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'delivery_method_id',
        'delivery_amount'
    ];

    

}
