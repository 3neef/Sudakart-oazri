@extends('layouts.app2')
@section('title', __('adminBody.product_list'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    {{-- <form class="form-inline search-form search-box">
                        <div class="form-group">
                            <input class="form-control-plaintext" type="search" placeholder="Search..">
                        </div>
                    </form> --}}
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
                                    <th>{{ __('adminBody.price') }}</th>
                                    <th>{{ __('adminBody.stoped') }}</th>
                                    <th>{{ __('adminBody.option') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>

                                    <td>

                                        <img src="{{asset($product->first)}}" data-field="image" alt="
                                            ">

                                    </td>

                                    <td data-field="name">{{$product->name}}</td>

                                    <td data-field="price">{{$product->category->name}}</td>

                                    <td data-field="name">{{$product->price}}</td>
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
                                            <i class="fa fa-eye" title="show"></i>
                                        </a>
                                        
                                        @can('edit-product')
                                        
                                        <a href="{{route('admin.products.edit', $product->id)}}">
                                            <i class="fa fa-edit" title="edit"></i>
                                        </a>
                                        @endcan
                                        @can('delete-product')
                                        <a href="{{route('admin.products.stop', $product->id)}}">
                                            <i class="fa fa-stop" title="stop"></i>
                                        </a>
                                        <form action="{{route('admin.products.destroy', $product->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash"></i></button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>

                                @endforeach
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