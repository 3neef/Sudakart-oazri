<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $casts = [
        'data' => 'json',
    ];
    public function order() {
        return $this->belongsTo(Order::class);
    }
}
