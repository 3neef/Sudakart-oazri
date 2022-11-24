@extends('layouts.app2')
@section('title', __('adminBody.PENDING_CATEGORIES_LIST'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-inline search-form search-box">
                        <div class="form-group">
                            <input class="form-control-plaintext" type="search" placeholder="Search..">
                        </div>
                    </form>

                    @if (auth()->user()->userable_type == 'App\Models\Vendor')
                        
                    <a href="{{route('admin.vendors.pending.categories.request')}}" class="btn btn-primary add-row mt-md-0 mt-2">
                        {{ __('adminBody.NEW_Category') }}
                    </a>
                    @endif
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th>{{ __('adminBody.shop_name') }}</th>
                                    <th>{{ __('adminBody.Image') }}</th>
                                    <th>{{ __('adminBody.Name') }}</th>
                                    <th>{{ __('adminDash.reason') }}</th>
                                    <th>{{ __('adminBody.Create_Date') }}</th>
                                    <th>{{ __('adminBody.Status') }}</th>
                                    <th>{{ __('adminBody.option') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($categories as $category )
                                <tr>
                                    
                                        @if (app()->getLocale() == 'en')
                                        <td data-field="name">{{$category->shop ? $category->shop->shop_en_name : 'oazri'}}</td>
                                        
                                        @else
                                        <td data-field="name">{{$category->shop ? $category->shop->shop_name : 'العزري'}}</td>
                                            
                                        @endif                

                                    <td>
                                        <img src="{{asset($category->category ? $category->category->image :
                                             'http://88.198.145.31/images/placeholder.png')}}"
                                        data-field="image" alt="">
                                    </td>
                                        @if (app()->getLocale() == 'en')
                                        <td data-field="name">{{$category->category ? $category->category->en_name : ''}}</td>
                                        
                                        @else
                                        <td data-field="name">{{$category->category ? $category->category->name : ''}}</td>
                                            
                                        @endif  

                                    <td data-field="price">{{$category->reason}}</td>

                                    <td data-field="price">{{$category->created_at}}</td>

                                    @if ($category->approved == true)
                                    <td class="order-success" data-field="status">
                                        <span>{{__('adminBody.Approved')}}</span>
                                    </td>
                                    
                                    @else
                                    <td class="order-cancle" data-field="status">
                                        <span>{{__('body.Pending')}}</span>
                                    </td>
                                        
                                    @endif

                                    <td>
                                        @if (auth()->user()->userable_type == 'App\Models\Admin' && $category->approved == false)
                                            
                                        <a href="{{route('admin.vendors.pending.approvedcategory', $category->id)}}">
                                            <i class="fa fa-check" title="{{__('adminBody.approve')}}"></i>
                                        </a>
                                        @endif

                                        <form action="{{route('admin.vendors.pending.destroycategory', $category->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash" title="{{__('body.delete')}}"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                    
                                @empty
                                    <tr>
                                    <td>no data </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {!! $categories->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection