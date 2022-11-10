<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'en_name',
        'parent_id',
        'commission',
        'image',
        'color',
    ];

    protected function getImageAttribute($value)
    {
         if($value){
            return    asset('storage/' . $value); 
         }else{
            return "";
         }
             
    }

    public static function booted () {
        self::creating(function ($model) {
            $model->setAttribute('uuid', Uuid::uuid4()->toString());
            // if (auth()->user()->userable_type == 'App\Models\Vendor') {
            //     $model->approved = 0;
            //     $model->commission = 0;
            // }
        });

    }

    public function shops () {
        return $this->belongsToMany(Shop::class, 'shop_categories');
    }

    public function products () {
        return $this->hasMany(Product::class);
    }

//    public function parent () {
//        return $this->belongsTo(Category::class, 'parent_id');
//    }

    public function children () {
        return $this->hasMany(Category::class, 'parent_id');
    }

}
