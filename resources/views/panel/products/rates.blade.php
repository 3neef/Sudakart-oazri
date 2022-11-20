@extends('layouts.app2')
@section('title', 'Products Reviews')
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
                    <div>
                        <div class="table-responsive table-desi">
                            <table class="review-table table all-package">
                                <thead>
                                    <tr>
                                        <th>{{ __('adminBody.no') }}</th>
                                        <th>{{ __('adminBody.customer_name') }}</th>
                                        <th>{{ __('adminBody.Product_Name') }}</th>
                                        <th>{{ __('adminBody.Create_Date') }}</th>
                                        <th>{{ __('adminBody.rating') }}</th>
                                        <th>{{ __('adminBody.comment') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rates as $rate)
                                        <tr>
                                            <td>{{$rate->id}}</td>
                                            <td>@if($rate->customer){{$rate->customer->name}}@endif</td>
                                            <td>{{$rate->product->en_name}}</td>
                                            <td>{{$rate->product->created_at}}</td>
                                            <td>
                                                <ul class="rating">
                                                @for ($i = 1; $i <= $rate->rate; $i++)
                                                    
                                                <li>
                                                    <i class="fa fa-star theme-color"></i>
                                                </li>
                                                @endfor
                                                @for ($i = 1; $i <= 5-$rate->rate; $i++)
                                                    
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                @endfor

                                                </ul>
                                            </td>
                                            <td>{{$rate->comment}}</td>
                                        </tr>
                                
                                    @endforeach
                                </tbody>
                                <div class="d-flex justify-content-center">
                                    {!! $rates->links() !!}
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection