<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'article_id',
        'comment'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }
    protected $appends = ['customer'];

    protected function getCustomerAttribute()
    {
        return $this->user->userable;      
    }

    public function article () {
        return $this->belongsTo(Article::class);
    }
}
