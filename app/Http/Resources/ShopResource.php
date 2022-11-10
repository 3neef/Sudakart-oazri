<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'vendor_id' => $this->vendor_id,
            'market_id' => $this->market_id,
            'city_id' => $this->city_id,
            'shop_name' => $this->shop_name,
            'shop_en_name' => $this->shop_en_name,
            'shop_Address' => $this->shop_Address,
            'lat' => $this->lat,
            'long' => $this->long,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'vendor' => $this->vendor,
            'categories' => $this->categories,
        ];
    }
}
