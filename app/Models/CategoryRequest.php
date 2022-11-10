<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'category_id',
        'reason',
        'approved'
    ];

    public function vendor () {
        return $this->belongsTo(Vendor::class);
    }

    public function shop () {
        return $this->belongsTo(Shop::class);
    }

    public function category () {
        return $this->belongsTo(Category::class);
    }
}
