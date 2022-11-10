<?php

namespace App\Http\Resources;

use App\Models\Favourite;
use App\Models\ProductOffer;
use App\Models\ProductOption;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id'             => $this->id,
            'views'          => $this->views,
            'uuid'           => $this->uuid,
            'name'           => $this->name,
            'en_name'        => $this->en_name,
            'description'    => $this->description,
            'en_description'    => $this->en_description,
            'price'          => $this->price,
            'quantity'       => $this->quantity,
            'image'          => $this->image,
            'images'         => $this->images,
            'rate'           => $this->rate,
            'is_favourite'   => (new Favourite())->isFavourite($this->id),
            'created_at'     => $this->created_at,
            'updated_at'     => $this->updated_at,
            'category'       => $this->category,
            'shop'           => $this->shop,
            'attributes'     => ProductOption::attributes($this->productOptions),
            'offer'          => $this->offers,
            'upsell'         => $this->upsell,
            'stop'           => $this->stop,
            'weight'         => $this->weight,
            'frs'            => $this->frs,
            'sku'            => $this->sku,
        ];
    }
}
