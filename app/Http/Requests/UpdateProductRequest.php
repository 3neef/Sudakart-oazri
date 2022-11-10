<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /** 
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       
        
    
        // if ($this->method() == "PUT")
        //  {
        //     $product = Product::findOrFail($this->request->id);
        //     if (auth()->user()->userable_type == 'App\Models\Admin' ||
        //         auth()->user()->userable->shop->id == $product->shop_id) {
        //         return true;
        //     }
        // }else
        // {
        //     return true;
        // }
        return true;
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'                => ['nullable', 'exists:products,id'],
            'category_id'       => [ 'exists:categories,id'],
            'name'              => [ 'string'],
            'en_name'           => [ 'string'],
            'sku'               => ['string'],
            'weight'            => ['nullable', 'string'],
            'frs'               => ['boolean'],
            'price'             => [ 'numeric'],
            'image'             => ['nullable', 'image'],
            'quantity'          => [ 'numeric', 'min:1'],
            'description'       => ['nullable', 'string'],
            'description_en'    => ['nullable', 'string'],
            'images'            => ['nullable', 'array'],
            'images.*.image_id' => ['nullable', 'exists:product_images,id'],
            'images.*.image'    => ['image'],
            'options'           => ['sometimes','nullable', 'array'],
            'options.*.option_id' => ['nullable','exists:options,id'],
            'options.*.increment' => ['nullable', 'numeric'],
            'options.*.quantity' => ['nullable', 'numeric'],
        ];
    }
}
