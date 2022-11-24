@extends('layouts.app2')
@section('title', __('adminBody.SALES_REPORT'))
@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">{{ __('adminBody.New') }}</a></li>
                    </ul>
                    @if ($errors->count() > 0)
                    {{$errors}}
                        
                    @endif
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="GET" action="{{route('admin.sales-report.request')}}" class="needs-validation user-add">
                                <h4>{{ __('adminBody.find_sales') }}</h4>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span>{{ __('adminBody.Vendors') }}</label>
                                    <div class="col-md-7">
                                        <div class="button-container" style=" margin-bottom: 10px;">
                                            <button type="button" onclick="selectAll()">{{ __('adminBody.Select_All') }}</button>
                                            <button type="button" onclick="deselectAll()">{{ __('adminBody.Deselect_All') }}</button>
                                        </div>
                                        <select class="js-example-basic-multiple form-control" name="vendors[]" multiple="multiple">
                                            @foreach($vendors as $id => $entry)
                                            <option value="{{ $id }}" {{ old('vendor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span>{{ __('adminBody.from') }}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="date_from" name="date_from" type="date"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span>{{ __('adminBody.to') }}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="date_to" name="date_to" type="date"
                                            required="">
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary" value="{{__('adminBody.save')}}"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    {{-- <form class="form-inline search-form search-box">
                        <div class="form-group">
                            <input class="form-control-plaintext" type="search" placeholder="{{ __('adminBody.Search') }}..">
                        </div>
                    </form> --}}

                    <div class="card-details-title">
                        <h3>{{ __('adminBody.Total_Sales') }} <span>@money($products->sum('total'),'OMR')</span></h3>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table list-digital all-package table-category "
                            id="editableTable">
                            <thead>
                                <tr>
                                    <th>{{ __('adminBody.no') }}</th>
                                    <th>{{ __('adminBody.product_image') }}</th>
                                    <th>{{ __('adminBody.Product_Name') }}</th>
                                    <th>{{ __('adminBody.product_category') }}</th>
                                    <th>{{ __('adminBody.price') }}</th>
                                    <th>{{ __('adminBody.Quantity') }}</th>
                                    <th>{{ __('adminBody.total') }}</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>

                                    <td>
                                    
                                        <img src="{{asset($product->product->first)}}"
                                            data-field="image" alt="
                                            ">
                                        
                                    </td>
                                        
                                    <td data-field="name">
                                        @if(app()->getLocale() == 'en')
                                        {{ $product->product->en_name }}
                                        @else
                                        {{ $product->product->name }}
                                        @endif    
                                    </td>

                                    <td data-field="price">
                                        @if(app()->getLocale() == 'en')
                                        {{ $product->product->category->en_name }}
                                        @else
                                        {{ $product->product->category->name }}
                                        @endif
                                    </td>

                                    <td data-field="name">@money($product->price , 'OMR')</td>

                                    <td data-field="name">{{$product->quantity}}</td>

                                    <td data-field="name">{{$product->total}}</td>

                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {!! $products->withQueryString()->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection