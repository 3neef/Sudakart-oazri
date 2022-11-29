@extends('layouts.app2')
@section('title', __('adminBody.product_list'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <form action="{{ route('admin.products.search') }}" method="get" class="search-form" role="search" style="position: relative;">
                        <div class="input-group mb-3">
                            <input type="search" name="q"  placeholder="{{ __('labels.search') }}" class="input-group-field" 
                                autocomplete="off"> 
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button">{{ __('body.search-btn') }}</button>
                            </div>
                        </div>
                    </form>
                    
                    @can('create-product', auth()->user())
                    <a href="{{route('admin.products.create')}}" class="btn btn-primary mt-md-0 mt-2">
                        {{ __('adminBody.new_product') }}
                    </a>
                    @endcan

                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table list-digital all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th>{{ __('adminBody.Product_Id') }}</th>
                                    <th>{{ __('adminBody.product_image') }}</th>
                                    <th>{{ __('adminBody.Product_Name') }}</th>
                                    <th>{{ __('adminBody.product_category') }}</th>
                                    <th>{{ __('adminBody.Quantity') }}</th>
                                    <th>{{ __('body.sku') }}</th>
                                    <th>{{ __('adminBody.price') }}</th>
                                    <th>{{ __('adminBody.stoped') }}</th>
                                    <th>{{ __('adminBody.option') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>

                                    <td>

                                        <img src="{{asset($product->first)}}" data-field="image" alt="
                                            ">

                                    </td>

                                    <td data-field="name">
                                        @if(app()->getLocale() == 'en')
                                        {{ $product->en_name }}
                                        @else
                                        {{ $product->name }}
                                        @endif    
                                    </td>

                                    <td data-field="price">
                                        @if(app()->getLocale() == 'en')
                                        {{ $product->category->en_name }}
                                        @else
                                        {{ $product->category->name }}
                                        @endif
                                    </td>

                                    <td data-field="name">{{$product->quantity > 0 ? $product->quantity : 0 }}</td>

                                    <td data-field="name">{{$product->sku}}</td>

                                    <td data-field="name">@money($product->price, 'OMR')</td>
                                    @if ($product->stop == false)
                                    <td class="td-check">
                                        <i data-feather="check-circle"></i>
                                    </td>

                                    @else

                                    <td class="td-cross">
                                        <i data-feather="x-circle"></i>
                                    </td>
                                    @endif

                                    <td>
                                        
                                        <a href="{{route('admin.products.show', $product->id)}}">
                                            <i class="fa fa-eye" title="{{ __('body.show') }}"></i>
                                        </a>
                                        
                                        @can('edit-product')
                                        
                                        <a href="{{route('admin.products.edit', $product->id)}}">
                                            <i class="fa fa-edit" title="{{ __('body.edit') }}"></i>
                                        </a>
                                        @endcan
                                        @can('delete-product')
                                        <a href="{{route('admin.products.stop', $product->id)}}">
                                            <i class="fa fa-stop" title="{{ __('body.stop') }}"></i>
                                        </a>
                                        <form action="{{route('admin.products.destroy', $product->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash" title="{{ __('body.delete') }}"></i></button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <h3 class="text-center text-danger">{{ __('labels.no_result') }}</h3>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection