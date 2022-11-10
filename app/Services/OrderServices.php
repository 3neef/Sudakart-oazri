<?php


namespace App\Services;

use App\Models\Coupon;
use App\Models\DeliveryMethod;
use App\Models\Offer;
use App\Models\Order;
use App\Models\OrderProduct; 
use App\Models\Product;
use App\Models\ProductOffer;
use App\Models\ProductOption;
use App\Models\UpSellProducts;
use Carbon\Carbon;

class OrderServices
{
    public static function products($products, Order $order)
    {
        $amount = 0;
        $vendors = [];

        foreach ($products as $product) {
            $amount += self::product($product, $order);
            if (self::productfree($product)->frs == 0) {
                $vendors[]  = self::productfree($product)->shop_id;
            }
        }
        $vendors_num = count(array_unique($vendors));
        
        $delivery_amount = $vendors_num * $order['delivery_amount'];

        self::update($order, [
            'amount' => $amount,
            'total' => $amount + $delivery_amount,
        ]);
    }

    private static function productfree($product){
        $item = Product::findorfail($product['product_id']);
        return $item;
    }

    private static function product($product, Order $order)
    {
        
        $item = self::getProduct($product['product_id'], $product['quantity'], $product['coupon_id']);
        
        $price = $item->price - (self::getOffer($item) * $item->price);
        $order_product = $order->products()->create(array_merge($product, [
            'price' => $price,
            'coupon_id' => $product['coupon_id'],
            'shop_id' => $item->shop_id,
        ]));
        $increments = self::options($order_product, $product['options']);
        $coupn = (($price + $increments) * self::hasCoupon($order_product));
        $order_product->update(['price' => ($price + $increments) - $coupn ]);
        return $order_product->price * $product['quantity'];
    }

    public static function options($order_product, $options)
    {
        $increment = 0;
        foreach ($options as $option) {
            $increment += self::option($order_product, $option);
        }
        return $increment;
    }
    public static function returnoptions($order_product, $options)
    {
        $increment = 0;
        foreach ($options as $option) {
            $increment += self::returnoption($order_product, $option);
        }
        return $increment;
    }

    private static function option($order_product, $option)
    {
        $option_increment = self::getOptionIncrement($option['product_option_id'], $order_product->quantity);

        $increment = $option_increment - (self::getOffer($order_product->product) * $option_increment);

        $order_product->options()->create(array_merge($option, ['increment' => $increment,]));
        return $increment;
    }
    private static function returnoption($order_product, $option)
    {
        $option_increment = self::getOptionIncrement($option['product_option_id'], $order_product->quantity);

        $increment = $option_increment - (self::getOffer($order_product->product) * $option_increment);
        return $increment;
    }

    private static function getProduct($product_id, $quantity, $coupon_id)
    {
        $product = Product::findOrFail($product_id);

        $product->update(['quantity' => $product->quantity - $quantity]);
        return $product;
    }

    private static function getOptionIncrement($product_option_id, $quantity)
    {
        $option = ProductOption::find($product_option_id)->first();

        $option->update(['quantity' => $option->quantity - $quantity]);
        return $option->increment;
    }

    private static function hasOffer($product)
    {

        $productOffer = ProductOffer::where('product_id', $product->id)->first();
        //bad case no offer
        if($productOffer){
            return  Offer::where('id', $productOffer->offer_id)
                ->whereDate('expire_at', '>=', Carbon::today())
                ->first();
        }else{
            return Offer::where('discount', 0)
            ->first();
        }
    }

    public static function hasCoupon($product){
        $coupn = Coupon::where('id', $product->coupon_id)->where('shop_id', $product->shop_id)->where('stop', 0)->where('expire_at','>=', Carbon::today())->first();

        if($coupn){
            return $coupn->discount;
        }else{
            return 0;
        }
    }

    public static function getOffer($product)
    {
        $offer = self::hasOffer($product);
        if ($offer) {
            return $offer->discount;
        }
        return  0;
    }

    public static function getDeliveryPrice($delivery_method_id)
    {
        $method = DeliveryMethod::findOrFail($delivery_method_id);
        return $method->price;
    }

    private static function update(Order $order, $fields)
    {
        $order->update($fields);
        return $order;
    }

    // {[TODO] + [implement] + [upselling] + [in] + [order]}
    private static function isUpsell($product_id){
        
        $has_upsell = UpSellProducts::where('product_id',$product_id)->get();
    }
}
