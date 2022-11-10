<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'balance',
        'pending'
    ];

    public function accountable () {
        return $this->morphTo();
    }

    public function transactions () {
        return $this->hasMany(Transaction::class);
    }
}
