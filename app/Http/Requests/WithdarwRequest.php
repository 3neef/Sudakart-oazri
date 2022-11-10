<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WithdarwRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $wallet = User::findOrFail($request->user_id)->userable->wallet->balance;
        return [
            'user_id' => ['required', 'exists:users,id'],
            'amount' => ['required', 'numeric', "max:$wallet"],
            'notes' => ['nullable', 'string']
        ];
    }
}
