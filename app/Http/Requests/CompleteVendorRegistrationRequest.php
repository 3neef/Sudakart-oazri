<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompleteVendorRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'phone'                 => ['required', 'exists:users,phone'],
            // 'code'                  => ['required', 'numeric'],
            'city_id'               => ['nullable', 'exists:cities,id'],
            'email'                 => ['nullable', 'exists:users,email', 'email'],
            'password'              => ['nullable', 'confirmed', 'string', 'min:8'],
            'first_name'            => ['required', 'string'],
            'last_name'             => ['required', 'string'],
            'secondary_phone'       => ['nullable', 'string', 'unique:customers', 'min:10', 'max:13'],
            'bank_name'             => ['required', 'string'],
            'account_number'        => ['required', 'numeric'],
            'account_holder_name'   => ['required', 'string'],
            'branch'                => ['required', 'string'],
            'market_id'             => ['nullable', 'exists:markets,id'],
            'shop_name'             => ['required', 'string'],
            'shop_en_name'          => ['required', 'string'],
            'shop_address'          => ['required', 'string'],
            'shop_categories'       => ['nullable', 'array'],
            'shop_categories.*.category_id' => ['required', 'exists:categories,id'],
            'lat'               => ['nullable', 'string'],
            'long'              => ['nullable', 'string'],
        ];
    }
}
