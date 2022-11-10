<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateProfileRequest extends FormRequest
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
            'city_id'           => ['nullable', 'exists:cities,id'],
            'name'              => ['nullable', 'string'],
            'first_name'        => ['nullable', 'string'],
            'last_name'         => ['nullable', 'string'],
            'secondary_phone'   => ['nullable', 'string', 'min:10', 'max:13'],
            'phone'   => ['nullable', 'string', 'min:10', 'max:13'],
            'secondary_email'   => ['nullable', 'email', 'min:10', 'max:13'],
            'bank_name'         => ['nullable', 'string'],
            'account_number'    => ['nullable', 'string'],
            'account_holder_name' => ['nullable', 'string'],
            'branch'            => ['nullable', 'string'],
            'address'           => ['nullable', 'string'],
            'lat'               => ['nullable', 'string'],
            'long'              => ['nullable', 'string'],
        ];
    }
}
