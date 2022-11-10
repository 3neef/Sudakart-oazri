<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ArticleComments extends Component
{
    public $comment;
    public $currentId;
    public $article;
    

    protected $rules = [
        'comment' => 'required',

    ];
    public function render()
    {
        $comments = Comment::where('article_id', $this->article->id)->with('user')->get();
        return view('livewire.article-comments')->with('comments',$comments);
    }

    public function comment()
    {
        $this->validate();
        $comment = new Comment;
        $comment->user_id = Auth::guard('web')->user()->id;
        $comment->article_id = $this->article->id;
        $comment->comment = $this->comment;
        $comment->save();

        session()->flash('message', 'Success!');
       
    }
}
