<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOptionsRequest extends FormRequest
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
            'attribute_id' => ['required', 'exists:attributes,id'],
            'options' => ['required', 'array'],
            'options.*.option' => ['required', 'string'],
            'options.*.en_option' => ['required', 'string'],
        ];
    }
}
