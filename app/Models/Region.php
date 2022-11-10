<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

        protected static function boot(){
            parent::boot();
            static::created(function ($model) {
            $model->region_id = "region_" . $model->id;
            $model->save();
            });
        }
}
