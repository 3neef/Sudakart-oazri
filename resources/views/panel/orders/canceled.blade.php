@extends('layouts.app2')
@section('title', __('adminBody.CANCELED_ORDERS_LIST'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <!-- <div class="card-header">
                    <h5>Manage Order</h5>
                </div> -->
                <div class="card-body order-datatable">
                    <table class="display" id="basic-1">
                        <thead>
                            <tr>
                                <th>{{ __('adminBody.Ref_No') }}</th>
                                <th>{{ __('adminBody.Product_Name') }}</th>
                                <th>{{ __('adminDash.payment_method') }}</th>
                                <th>{{ __('adminBody.delivery_amount') }}</th>
                                <th>{{ __('adminBody.order_status') }}</th>
                                <th>{{ __('adminBody.date') }}</th>
                                <th>{{ __('adminBody.total') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            
                        <tr>
                            <td>#{{$order->id}}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @foreach ($order->products as $product )
                                        <img src="{{asset($product->product->first)}}" alt=""
                                            class="img-fluid img-30 me-2 blur-up lazyloaded">
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                @if ($order->payment_method == 'online')
                                    
                                <span class="badge badge-secondary">{{$order->payment_method}}</span>
                                @else
                                
                                <span class="badge badge-danger">{{$order->payment_method}}</span>
                                @endif
                            </td>
                            <td>{{$order->delivery_amount}}</td>
                            <td><span class="badge badge-danger">{{$order->status}}</span></td>
                            <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->format('d-m-Y')}}</td>
                            <td>{{$order->total}} OMR</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection