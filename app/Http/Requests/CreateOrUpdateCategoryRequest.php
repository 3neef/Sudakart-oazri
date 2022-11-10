<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdateCategoryRequest extends FormRequest
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
            'parent_id' => ['nullable', 'exists:categories,id'],
            'commission' => ['nullable', 'numeric'],
            'image' => ['nullable', 'image']
        ];
    }
}
