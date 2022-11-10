<?php

namespace App\Http\Requests;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateReturningRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $id = $request->order_product_id;
        $order_id = $request->order_id;
        $order = Order::findOrFail($request->order_id);
        $order_product = OrderProduct::where([
            'product_id' => $id,
            'order_id' => $order_id
            ])->first();
        abort_if(auth()->user()->userable_id != $order_product->order->customer_id,
            '403',
            __('You are not the user who made the order'));
        
        abort_if($order->status != 'completed',
        '403',
        __('You can not return the product, your order is not delivered yet'));    
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
            'order_id'=>['required','exists:order_products,order_id'],
            'order_product_id' => ['required', 'exists:order_products,product_id'],
            'reason' => ['required', 'string'],
        ];
    }
}
