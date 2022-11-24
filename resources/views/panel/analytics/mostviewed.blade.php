@extends('layouts.app2')
@section('title', __('adminNav.most_viewed_product'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                   
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
                                    <th>{{ __('adminBody.views') }}</th>
                                    <th>{{ __('adminBody.stoped') }}</th>
                                  
                                   
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                     <td>{{ $loop->index + 1}}</td>

                                    <td>
                                    
                                        <img src="{{asset($product->first)}}"
                                            data-field="image" alt="
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

                                    <td data-field="name">{{$product->price}}</td>
                                    <td>{{$product->views}}</td>

                                    @if ($product->stop == false)
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
