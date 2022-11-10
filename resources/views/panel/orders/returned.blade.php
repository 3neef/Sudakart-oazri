@extends('layouts.app2')
@section('title', __('adminBody.Returned_Products_List'))
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

                    {{-- <a href="add-digital-product.html" class="btn btn-primary mt-md-0 mt-2">Add New
                        Product</a> --}}
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table list-digital all-package table-category "
                            id="editableTable">
                            <thead>
                                <tr>
                                    <th>{{ __('adminDash.order_ref') }}</th>
                                    <th>{{ __('adminBody.product_image') }}</th>
                                    <th>{{ __('adminBody.customer_name') }}</th>
                                    <th>{{ __('adminBody.Product_Name') }}</th>
                                    <th>{{ __('adminDash.product_status') }}</th>
                                    <th>{{ __('adminDash.reason') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td data-field="name">#{{$product->order_id}}</td>


                                    <td>
                                      
                                        <img src="{{asset($product->product ? $product->product->first : 'images/placeholder.png')}}"
                                            data-field="image" alt="
                                            ">
                                        
                                    </td>
                                    <td data-field="name">{{$product->orderProduct ? $product->orderProduct->order->customer->name : 'deleted customer' }}</td>

                                    <td data-field="name">{{$product->product ? $product->product->name : 'deleted product id=  '.$product->order_product_id }}</td>

                                    <td data-field="price">{{$product->status}}</td>

                                    <td data-field="name">{{$product->reason}}</td>
                                    
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