<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterDriverRequest extends FormRequest
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
            'phone' => ['required', 'string', 'unique:users,phone', 'min:10', 'max:13'],
            'name' => ['required', 'string', 'max:121'],
            'email' => ['required', 'email', 'unique:users,email'],
            'secondary_email' => ['required', 'email'],
            'secondary_phone' => ['required', 'string', 'min:10', 'max:13'],
            'vehicle' => ['nullable', 'string', 'max:121', Rule::in(['motor', 'car', 'mini van', 'van', 'truck'])],
            'image' => [ 'image'],
            'identity' => ['image'],
            'address' => [ 'string'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
            
        ];
    }
}
