<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateExpenseRequest extends FormRequest
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
            'expense_type_id' => ['required', 'exists:expense_types,id'],
            'price'           => ['required', 'numeric'],
            'expense_date' => ['required', 'date'],
            'image' => ['nullable', 'image']
        ];
    }
}
