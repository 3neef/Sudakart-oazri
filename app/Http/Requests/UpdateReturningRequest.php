<?php

namespace App\Http\Requests;

use App\Models\ReturnedProducts;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UpdateReturningRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $id = $this->route()->parameters()['returning'];
        $returned = ReturnedProducts::findOrFail($id);

        // if ($request->driver_id) {
        //     abort_if(auth()->user()->userable_type != 'App\Models\Admin' && $request->driver_id != null,
        //         '403',
        //         __('only admins can assign drivers')
        //     );
        // }

        abort_if(($returned->status == 'pending' && $request->status != 'approved') && $request->driver_id != null,
        '403',
        __('you cannot assign driver without changing status to approved'));

        abort_if($returned->status == 'rejected' || $returned->status == 'returned' || $returned->status == 'canceled',
        '403',
        __('you cannot change the status'));


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
            'driver_id' => ['nullable', 'exists:drivers,id'],
            'status' => ['nullable', Rule::in(['rejected', 'refunded', 'approved', 'returned'])]
        ];
    }
}
