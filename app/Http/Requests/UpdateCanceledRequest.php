<?php

namespace App\Http\Requests;

use App\Models\ReturnedProducts;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UpdateCanceledRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {

            abort_if(auth()->user()->userable_type != 'App\Models\Admin',
                '403',
                __('only admins can update canceled orders')
            );
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
            'status' => ['nullable', Rule::in(['requested', 'approved', 'confirmed'])]
        ];
    }
}
