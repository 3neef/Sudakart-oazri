<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdateAttributeRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'en_name' => ['required', 'string'],
            'options' => ['nullable', 'array'],
            'options.*.option' => ['required', 'string'],
            'options.*.en_option' => ['required', 'string'],
        ];
    }
}
