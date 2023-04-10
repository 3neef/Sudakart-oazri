<?php

namespace App\Models;

use App\Traits\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; 
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Order extends Model
{
    use HasFactory, Notification, LogsActivity;

    protected $fillable = [
        'customer_id',
        'delivery_method_id',
        'take_by',
        'delivered_by',
        'amount',
        'delivery_amount',
        'total',
        'profit',
        'taken_at',
        'delivered_at',
        'payment_method',
        'address',
        'lat',
        'long',
        'gift',
        'status',
        'region_id',
        'approved',
        'handover',
        'delivery_ref_id'
    ];

    protected $appends = ['start', 'vendor_total'];
    protected $with = ['payment'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logFillable()->logOnlyDirty()->useLogName('Order')->setDescriptionForEvent(fn(string $eventName) => "The order no- ".$this->id." has been {$eventName}");
    }
    protected function getStartAttribute()
    { 
        return (object) array('lat' => '15.60649592111121', 'long' => '32.52949785224432');
    }

    protected function getEndAttribute()
    { 
        if(Str::contains($this->region_id, 'region_') == false){
        $city = City::findorfail($this->region_id)->name;
        }
        return (object) array('city' => $city, 'address' => $this->address);
    }

    protected function getVendorTotalAttribute()
    { 
        if(Auth::user() != null && Auth::user()->userable_type == 'App\Models\Vendor'){
            $products = $this->products->where('shop_id', auth()->user()->userable->shop->id);
            $total = 0;
            foreach($products as $product){
                $total += $product->price * $product->quantity;
            }
            return $total;
        }
    }
    
    public function customer () {
        return $this->belongsTo(Customer::class);
    }

    public function products () {
        return $this->hasMany(OrderProduct::class);
    }

    public function options () {
        return $this->hasManyThrough(OrderProductOption::class, OrderProduct::class);
    }

    public function newProduct()
    {
        if (Auth::user() != null && Auth::user()->userable_type == 'App\Models\Vendor'){
            return $this->belongsToMany(Product::class,'order_products')->wherePivot('shop_id', auth()->user()->userable->shop->id)
            ->withPivot('quantity')
            ->withPivot('id')
            ->withPivot('price')
            ->withTimeStamps();
        }else{
            return $this->belongsToMany(Product::class,'order_products')
            ->withPivot('quantity')
            ->withPivot('id')
            ->withPivot('price')
            ->withTimeStamps();
        }
      
    }
    public function payment() {
        return $this->hasOne(Payment::class);
    }
}
