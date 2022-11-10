<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShopRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->user()->userable_type == 'App\Models\Vendor' || auth()->user()->userable_type == 'App\Models\Admin'){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shop_name'     => ['required', 'string'],
            'shop_en_name'  => ['required', 'string'],
            'shop_address'  => ['required', 'string'],
            'market_id'     => ['nullable', 'exists:markets,id'],
            'city_id'       => ['nullable', 'exists:cities,id'],
            'lat'           => ['nullable', 'string'],
            'long'          => ['nullable', 'string'],
            'shop_categories'   => ['nullable', 'array'],
            'shop_categories.*.category_id' => ['required', 'exists:categories,id'],
        ];
    }
}
