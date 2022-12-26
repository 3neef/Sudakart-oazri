<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    use HasFactory, HasUuid, SoftDeletes, LogsActivity;

    protected $fillable = [
        'shop_id',
        'category_id',
        'name',
        'en_name',
        'price',
        'sku',
        'weight',
        'frs',
        'image',
        'quantity',
        'description',
        'en_description',
        'cost',
        'warranty',
        'stop'
    ];
    // protected static $logName = 'product';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logFillable()->logOnlyDirty()->useLogName('product')->setDescriptionForEvent(fn(string $eventName) => "The product no- ".$this->id." has been {$eventName}");
    }

    protected function getRateAttribute()
    { 
        $a = Rate::where('product_id', $this->id)->get()->sum('rate');
        $b = Rate::where('product_id', $this->id)->count();
        if($b != 0){
            $rate = $a/$b;
            return round($rate, 1);
        }else{
            $rate =0;
            return $rate;
        }
    }

    public function shop () {
        return $this->belongsTo(Shop::class);
    }

    public function category () {
        return $this->belongsTo(Category::class);
    }

    public function articles () {
        return $this->BelongsToMany(Article::class, 'article_products');
    }

    public function options () {
        return $this->hasManyThrough(Option::class, ProductOption::class);
    }

    public function productOptions () {
        return $this->hasMany(ProductOption::class);
    }
    protected $with = ['images',];
    protected $appends = ['attributes', 'first','rate','ProductImages'];

    protected function getAttributesAttribute(){
        $attributes = ProductOption::attributes($this->productOptions);
        return $attributes;
    }
    
    public function images () {
        return $this->hasMany(ProductImage::class);
    }


   protected function getFirstAttribute(){
        if($this->images->count() > 0){
            return $this->images->first()->image;
        }else{
            return 'images/placeholder.png';
        }
    }


    public function favourites () {
        return $this->hasMany(Favourite::class);
    }

    public function rates () {
        return $this->hasMany(Rate::class);
    }

    public function orders ()  {
        return $this->hasMany(OrderProduct::class);
    }

    public function Offers () {
        return $this->belongsToMany(Offer::class, 'product_offers')->whereDate('expire_at', '>=' , today());
        // return $this->belongsToMany(Offer::class);
    }
    public function getUpsellAttribute()
    {
        $upSellProduct = UpSellProducts::where('product_id', $this->id)->first();
        if($upSellProduct){
            $items =  UpSellProducts::where('up_sell_id', $upSellProduct->up_sell_id)->with('product')->get();
            $upsell = UpSell::findorfail($upSellProduct->up_sell_id);
            return (object) array('Upsell' => $upsell, 'products' => $items);
            
        }else{
            return null;
        }
    }


    public function newOrder()
    {
       return $this->belongsToMany(Order::class,'order_products')
            ->withPivot('quantity')
            ->withPivot('id')
            ->withPivot('price')
            ->withTimeStamps();
    }


     public function getProductImagesAttribute(){
        
        $images = [];
        foreach ($this->images as $image) {
            array_push($images,$image->image);
        }
		if(count($images) == 0){
			$images[] = "/images/placeholder.png";
		}
		 
        return $images;
    
    }
    

    public function getIncrement($option)
    {
        $increment = DB::table('options as os')
                ->select([
                   DB::raw('po.id as product_option_id'), 'os.en_option' , 'po.increment' , 'po.option_id'
                ])
                ->leftJoin('product_options as po','os.id','po.option_id')
                ->where('po.option_id',$option)
                ->where('po.product_id',$this->id)
                ->first();
        return $increment;
    }

    public static function displayOptions($product_option_id)
    {
        $result = DB::table('product_options as po')
                ->select([
                   'options.en_option' , 'po.increment' , 'att.en_name','options.option','att.name'
                ])
                ->leftJoin('options','options.id','po.option_id')
                ->leftJoin('attributes as att','att.id','options.attribute_id')
                ->where('po.id',$product_option_id)
                ->first();
        $body = "";
        if(app()->getLocale() == 'en'){
            $body .= "<div> ".$result->en_name." : ".$result->en_option." </div>";
            $body .= "<div>".trans('body.Added_Value')." : ".$result->increment."</div>";
        }else {
            $body .= "<div> ".$result->name." : ".$result->option." </div>";
            $body .= "<div>".trans('body.Added_Value')." : ".$result->increment."</div>";
        }
       
        return $body;
    }

    public static function getImageBy($id)
    {
        $product = Product::findOrFail($id);
        return $product->ProductImages[0];
    }

    public static function getRateById($id)
    {
        $a = Rate::where('product_id', $id)->get()->sum('rate');
        $b = Rate::where('product_id', $id)->count();
        if($b != 0){
            $rate = $a/$b;
            return round($rate, 1);
        }else{
            $rate =0;
            return $rate;
        }
    }

    public static function getOptions($order_id,$product_id)
    {
        $result = DB::table('order_products as op')
        ->select([
           'options.en_option' , 'tis.increment' , 'att.en_name','options.option','att.name'
        ])
        ->leftJoin('order_product_options as ops','ops.order_product_id','op.id')
        ->leftJoin('product_options as tis','tis.id','ops.product_option_id')
        ->leftJoin('options','options.id','tis.option_id')
        ->leftJoin('attributes as att','att.id','options.attribute_id')
        ->where('op.order_id',$order_id)
        ->where('op.product_id',$product_id)
        ->get();
       

        return $result;
    }
}