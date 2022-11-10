<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'image'];

    protected function getImageAttribute($value)
    {
        return    asset('storage/' . $value);     
    }

    public function product () {
        return $this->belongsTo(Product::class);
    }
}
