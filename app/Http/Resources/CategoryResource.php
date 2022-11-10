<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class CategoryResource extends JsonResource
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
            'id'        => $this->id,
            'uuid'      => $this->uuid,
            'name'      => $this->name,
            'en_name'   => $this->en_name,
//            'parent'    => new CategoryResource($this->parent),
            'children'  => CategoryResource::collection($this->children),
            'image'     => $this->image,
            'color'     => $this->color,
        
        ];
    }
}
