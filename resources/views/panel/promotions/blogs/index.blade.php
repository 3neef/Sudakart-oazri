@extends('layouts.app2')
@section('title', __('adminBody.Blogs'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-inline search-form search-box">
                        <div class="form-group">
                            <input class="form-control-plaintext" type="search" placeholder="{{ __('adminBody.Search') }}..">
                        </div>
                    </form>

                    <a href="{{route('admin.blogs.create')}}" class="btn btn-primary mt-md-0 mt-2">
                        {{ __('adminBody.new_blog') }}
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="all-package coupon-table table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('adminBody.shop_name') }}</th>
                                    <th>{{ __('adminBody.blog_title') }}</th>
                                    <th>{{ __('adminBody.content') }}</th>
                                    <th>{{ __('adminBody.Created_On') }}</th>
                                    <th>{{ __('adminBody.views') }}</th>
                                    <th>{{ __('adminBody.Approved') }}</th>
                                    <th>{{ __('adminBody.Actions') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($articles as $article)
                                <tr data-row-id="1">
                                     <td>{{$article->shop ? $article->shop->shop_en_name : 'admin' }} </td>
                                    <td>{{$article->title}} </td>
                                    <td> {{Str::limit($article->content, 20)}}</td>
                                    <td class="list-date"> {{ \Carbon\Carbon::createFromTimestamp(strtotime($article->created_at))->format('d-m-Y')}}
                                    </td>
                                    <td>{{$article->views}}</td>
                                    @if ($article->approved == true)
                                        <td class="td-check">
                                            <i data-feather="check-circle"></i>
                                        </td>
                                            
                                        @else
                                            
                                        <td class="td-cross">
                                            <i data-feather="x-circle"></i>
                                        </td>
                                        @endif
                                        <td>
                                            <a href="{{route('admin.blogs.show', $article->id)}}">
                                                <i class="fa fa-eye" title="approve"></i>
                                            </a>
                                            <form action="{{route('admin.blogs.approve', $article->id)}}" method="POST">
                                                @csrf
                                                @method('Put')
                                                <input type="number" value="1" name="approved" hidden>
                                                <button type="submit" style="border:none"><i class="fa fa-stop"></i></button>
                                            </form>
                                            <form action="{{route('admin.blogs.destroy', $article->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {!! $articles->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection