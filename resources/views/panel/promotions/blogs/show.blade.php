@extends('layouts.app2')
@section('title', 'Show a Post')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <section class="blog-detail-page section-b-space ratio2_3">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 blog-detail">
                                <h3>{{$article->title}}</h3>
                                <ul class="post-social">
                                    <li>{{$article->created_at}}</li>
                                    <li>Posted By :{{$article->shop->shop_name}}</li>
                                    <li><i class="fa fa-heart"></i> {{$article->views}} Hits</li>
                                    <li><i class="fa fa-comments"></i> {{$article->comments->count()}} Comments</li>
                                </ul>
                                <p>{!! $article->content !!}</p>
                            </div>
                        </div>
                        <div class="row section-b-space">
                            <div class="col-sm-12">
                                <ul class="comment-section">
                                    <li>
                                        @forelse ($article->comments as $comment) 
                                        <div class="media mt-4 mb-4"><img src="{{asset('images/arab.png')}}" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h6>{{$comment->user->userable->name}} <span>( {{$comment->created_at}})</span></h6>
                                                <p>{!! $comment->comment !!}</p>
                                            </div>
                                        </div>
                                            
                                        @empty
                                            <p>No comments</p>
                                        @endforelse
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{asset('css/style.css')}}" rel="stylesheet" />

@endpush