@extends('layouts.app2')
@section('title', 'Stoped Products')
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

                    
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table list-digital all-package table-category "
                            id="editableTable">
                            <thead>
                                <tr>
                                    <th>{{ __('adminBody.Product_Id') }}</th>
                                    <th>{{ __('adminBody.product_image') }}</th>
                                    <th>{{ __('adminBody.Product_Name') }}</th>
                                    <th>{{ __('adminBody.product_category') }}</th>
                                    <th>{{ __('adminBody.price') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>

                                    <td>
                                      
                                        <img src="{{asset($product->first)}}"
                                            data-field="image" alt="
                                            ">
                                        
                                    </td>
                                        
                                    <td data-field="name">{{$product->name}}</td>

                                    <td data-field="price">{{$product->category->name}}</td>

                                    <td data-field="name">{{$product->price}}</td>
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