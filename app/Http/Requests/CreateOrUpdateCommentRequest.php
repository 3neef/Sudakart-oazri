<?php

namespace App\Http\Requests;

use App\Models\Comment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class CreateOrUpdateCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        // if ($request->id) {
        //     $comment = Comment::findOrFail($request->id);
        //     abort_if($comment->user_id != auth()->id(), 403, __('this resource does not belong to you'));
        // }
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
            'id' => ['nullable', 'exists:comments,id'],
            'article_id' => ['required', 'exists:articles,id'],
            'comment' => ['required', 'string']
        ];
    }
}
