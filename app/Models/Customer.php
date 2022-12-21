<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'name',
        'secondary_phone',
        'city_id',
        'address',
        'lat',
        'long',
    ];

    public function user () {
        return $this->morphOne(User::class, 'userable');
    }

    public function city () {
        return $this->belongsTo(City::class);
    }

    public function orders () {
        return $this->hasMany(Order::class);
    }

    public function wallet () {
        return $this->morphOne(Wallet::class, 'accountable');
    }

    public function transactions () {
        return $this->morphMany(Transaction::class, 'operator');
    }
}
