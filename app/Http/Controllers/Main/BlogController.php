<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id','desc')->paginate(10);
        $pubs = Article::orderBy('views','desc')->take(6)->get();
        return view('main.blog.index')
        ->with([
            'articles' => $articles ,
            'pubs' => $pubs
        ]);
    }


    public function show($id)
    {
        $article = Article::findOrFail($id);
        $article->increment('views');
        return view('main.blog.show')->with(['article' => $article]);
    }
}
