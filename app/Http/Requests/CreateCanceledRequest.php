<?php

namespace App\Http\Requests;

use App\Models\OrderProduct;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateCanceledRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $order_id = $request->order_id;
        $order_products = OrderProduct::where([
            'order_id' => $order_id
            ])->get();

            foreach ($order_products as $product){
                abort_if(auth()->user()->userable_id != $product->order->customer_id,
                    '403',
                    __('You are not the user who made the order'));
                
            }
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
            'order_id'=>['required','exists:orders,id', 'unique:canceled_orders,order_id']
        ];
    }
}
