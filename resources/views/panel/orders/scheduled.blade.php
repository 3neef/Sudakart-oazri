@extends('layouts.app2')
@section('title', 'Scheduled Order List')
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
                                <th>Ref No.</th>
                                <th>Product</th>
                                <th>Payment Method</th>
                                <th>Delivery Amount</th>
                                <th>Order Status</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Approved</th>
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
                            <td><span class="badge badge-success">{{$order->status}}</span></td>
                            <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->format('d-m-Y')}}</td>
                            <td>{{$order->total}} OMR</td>
                            @if ($order->approved == true)
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
@endsection