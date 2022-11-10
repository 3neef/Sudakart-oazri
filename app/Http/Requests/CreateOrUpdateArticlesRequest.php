<?php

namespace App\Http\Requests;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateOrUpdateArticlesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        // abort_if(auth()->user()->userable_type != 'App\Models\Vendor', 403, __('you need to login as vendor'));
        if ($request->id) {
            $article = Article::findORFail($request->id);
            abort_if(auth()->user()->userable->shop->id != $article->shop_id, 403, __('you are not the author of the article'));
        }
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
            'id' => ['nullable', 'exists:articles,id'],
            'title' => ['nullable', 'string', 'max:125'],
            'content' => ['string', 'nullable']
        ];
    }
}
