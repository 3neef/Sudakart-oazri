<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdateAdvertisementRequest extends FormRequest
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
            'id' =>  ['nullable', 'exists:advertisements,id'],
            'title' => ['nullable', 'string', 'max:121'],
            'media' => ['required', 'mimes:jpg,bmp,png,gif,mb4,mkv'],
            'description' => ['string'],
            'url' => ['nullable', 'url'],
            'expire_at' => ['required', 'date']
        ];
    }
}
