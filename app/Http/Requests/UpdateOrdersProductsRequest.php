<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrdersProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // if ($this->request->driver_id) {
        //     abort_if(auth()->user()->userable_type != 'App\Models\Admin' && $this->request->driver_id != null,
        //         '403',
        //         __('only admins can assign drivers')
        //     );
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
            'taken_by' => ['nullable', 'exists:drivers,id'],
            'driver_id' => ['nullable', 'exists:drivers,id'],
            'status' => ['nullable', Rule::in(['pending', 'taken', 'delivered', 'packaging','canceled', 'returned'])],
            'product_id' => ['nullable', 'exists:products,id'],

            // 'products' => ['required', 'array'],
            // 'products.*.' => ['required', 'exists,order_products,id']
        ];
    }
}
