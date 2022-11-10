<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'name',
        'secondary_phone',
        'vehicle',
        'secondary_email',
        'image',
        'identity',
        'address'
    ];

    public function user () {
        return $this->morphOne(User::class, 'userable');
    }

    public function wallet () {
        return $this->morphOne(Wallet::class, 'accountable');
    }

    public function orders () {
        return $this->hasMany(Order::class);
    }
}
