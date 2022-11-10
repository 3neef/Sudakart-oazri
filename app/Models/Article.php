<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'title',
        'content',
        'approved'
    ];
    protected $with = [
        'comments','shop', 'products'
    ];

    public function shop () {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public function comments () {
        return $this->hasMany(Comment::class);
    }

    public function products () {
        return $this->belongsToMany(Product::class, 'article_products');

    }
}
