<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterVendorRequest extends FormRequest
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
            'phone'             => ['required', 'string', 'unique:users', 'min:10', 'max:13'],
            'email'             => ['nullable', 'unique:users', 'email'],
            // 'password'          => ['required', 'confirmed', 'string', 'min:8'],
        ];
    }
}
