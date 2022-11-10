@extends('layouts.app2')
@section('title', __('adminBody.Blogs'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">

                   
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
                                       
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection