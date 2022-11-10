<?php

namespace App\Http\Controllers;

use App\Collections\ArticlesCollection;
use App\Http\Requests\CreateOrUpdateArticlesRequest;
use App\Models\Article;
use App\Models\ArticleProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        $perPage = $request->limit  ? $request->limit : 50;
        if (Auth::user() != null && Auth::user()->userable_type == 'App\Models\Vendor'){
            $articles  = Article::where('shop_id', auth()->user()->userable->shop->id)->with('shop')
        ->with('comments')
        ->with('products')
        ->paginate($perPage);
            
        }else{
            $articles  = Article::where('approved', 1)->with('shop')
            ->with('comments')
            ->with('products')
            ->paginate($perPage);
            
        }
        return $articles;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOrUpdateArticlesRequest $request
     * @return mixed
     */
    public function store(CreateOrUpdateArticlesRequest $request)
    {
        if (auth()->user()->userable_type == 'App\Models\Vendor'){
            $article = Article::updateOrCreate(['id' => $request->id], array_merge($request->validated(), ['shop_id' => auth()->user()->userable->shop->id]));
            
        }else{
            $article = Article::updateOrCreate(['id' => $request->id], array_merge($request->validated(), ['shop_id' => null]));
            
        }
        if($article){
            foreach ($request->products as $product){
                ArticleProduct::create(array_merge(['article_id' => $article->id], $product));
            }
        }
        if (! $request->expectsJson()) {
            return redirect()->route('admin.blogs');
        }
        return $article;
    }
    public function update(CreateOrUpdateArticlesRequest $request, Article $article)
    {
        // dd($article->products);
        $art = $article->update($request->validated());
        if($art){
            if($request->products){
                ArticleProduct::where('article_id', $article->id)->delete();
                foreach ($request->products as $product){
                    ArticleProduct::create(array_merge(['article_id' => $article->id], $product));
                }
            }
        }
        if (! $request->expectsJson()) {
            return redirect()->route('admin.blogs');
        }
        return $article;
    }
    public function show(Request $request, Article $article)
    {
        $article->increment('views');
        $perPage = $request->limit  ? $request->limit : 50;
        $article  = Article::where('id', $article->id)->with('shop')
        ->with('comments')
        ->with('products')
        ->paginate($perPage);

        return $article;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return mixed
     */
    public function destroy(Request $request, Article $article)
    {
        if (auth()->user()->userable_type == 'App\Models\Admin' ||
            auth()->user()->userable->shop->id == $article->shop_id) {
            $article->delete();
            if (! $request->expectsJson()) {
                return redirect()->route('admin.blogs');
            }
            return response(['message' => __('article has been deleted')]);
        }
        abort(403, __('access un authorized resource'));
    }
}
