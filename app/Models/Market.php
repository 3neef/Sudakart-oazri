<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Market extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'city_id',
        'name',
        'en_name',
        'lat',
        'long',
    ];

    public function city () {
        return $this->belongsTo(City::class);
    }

    public function shops () {
        return $this->hasMany(Shop::class);
    }
}
