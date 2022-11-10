<?php


namespace App\Services;


use App\Models\Offer;
use App\Models\ProductOffer;

class OfferServices
{
    public static function offerProducts (array $products, Offer $offer) {
        foreach ($products as $product) {
            $offer_product = ProductOffer::where('product_id', $product)->first(); 
            if($offer_product != null && $offer_product->offer->expire_at  >= today()) {
                abort(409, __('you already have an offer for this product'));
            }elseif($offer_product != null && $offer_product->offer->expire_at  < today()){
                $offer_product->delete();
                ProductOffer::create(array_merge(['offer_id' => $offer->id], $product));
            }else{
                ProductOffer::create(array_merge(['offer_id' => $offer->id], $product));
            }
        }
        return true;
    }

    public static function upOfferProducts ($products, $offer) {
        foreach ($products as $product) {
            $offer->product_offer()->update(array_merge(['offer_id' => $offer->id], $product));
        }
        return true;
    }

}
