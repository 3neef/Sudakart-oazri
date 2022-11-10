<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'attribute_id',
        'option',
        'en_option'
    ];

    public function attribute () {
        return $this->belongsTo(Attribute::class);
    }

    public function productOptions () {
        return $this->hasMany(ProductOption::class);
    }
}
