<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdateMarketRequest extends FormRequest
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
            'id' => ['nullable', 'exists:markets,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'name' => ['required', 'string'],
            'lat' => ['nullable', 'string'],
            'long' => ['nullable', 'string'],
        ];
    }
}
