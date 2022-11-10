<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAdminRequest extends FormRequest
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
            'secondary_email' => ['required', 'email'   ],
            'secondary_phone' => ['required', 'string', 'min:10', 'max:13'],
            'phone' => ['required', 'string', 'unique:users,phone', 'min:10', 'max:13'],
            'email' => ['required', 'email', 'unique:users,email'],
            'address' => ['required', 'string'],
            'role' => ['nullable', 'string'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
        ];
    }
}
