<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'product_id'
    ];

    public function article () {
        return $this->belongsTo(Article::class);
    }

    public function product () {
        return $this->belongsTo(Product::class);
    }
    
}
