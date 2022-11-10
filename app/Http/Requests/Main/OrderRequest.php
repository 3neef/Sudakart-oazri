<?php

namespace App\Http\Requests\Main;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'coupon_id' => ['nullable', 'exists:coupons,id'],
            'shipping_cost' => ['required'],
            'payment_method' => ['required', Rule::in(['online', 'cash','bank'])],
            'address' => ['required', 'string'],
            'gift' => ['nullable', 'boolean'],
            'region_id' => ['required'],
            'shipping_cost' => ['required'],
        ];
    }
}
