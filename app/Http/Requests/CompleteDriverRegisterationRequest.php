<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompleteDriverRegisterationRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:121'],
            'code'=> ['required', 'numeric'],
            'secondary_email' => ['required', 'email'],
            'secondary_phone' => ['required', 'string', 'min:10', 'max:13'],
            'phone' => ['required', 'exists:users,phone', 'min:10', 'max:13'],
            'vehicle' => ['nullable', 'string', 'max:121', Rule::in(['motor', 'car', 'mini van', 'van', 'truck'])],
            'image' => [ 'image'],
            'identity' => ['image'],
            'address' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
        ];
    }
}
