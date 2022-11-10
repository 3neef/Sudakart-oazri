<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrUpdateCommentRequest $request)
    {
        return Comment::updateOrCreate(['id' => $request->id], array_merge($request->validated(), ['user_id' => auth()->id()]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return mixed
     */
    public function destroy(Comment $comment)
    {
        if (auth()->user()->userable_type == 'App\Models\Admin' || auth()->id() == $comment->user_id) {
            $comment->delete();
            return response(['message' => __('comment has been deleted successfully')]);
        }
        abort(403, __('access un authorized resource'));
    }
}
