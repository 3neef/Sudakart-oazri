<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateOrderRequest extends FormRequest
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
            'region_id'=>['nullable'],
            'delivery_amount'=>['nullable'],
            'coupon_id' => ['nullable', 'exists:coupons,id'],
            // 'delivery_method_id' => ['required', 'exists:delivery_methods,id'],
            'payment_method' => ['required', Rule::in(['online', 'cash', 'bank'])],
            'take_by' => ['nullable'],
            'delivered_by' => ['nullable', 'exists:drivers,id'],
            'products' => ['required', 'array'],
            'products.*.product_id' => ['required', 'exists:products,id'],
            'products.*.quantity' => ['required', 'numeric'],
            'products.*.options' => ['nullable','array'],
            'products.*.options.*.product_option_id' => [ 'exists:product_options,id'],
            'address' => ['required', 'string'],
            'lat' => ['required', 'string'],
            'long' => ['required', 'string'],
            'gift' => ['nullable', 'boolean']
        ];
    }
}
