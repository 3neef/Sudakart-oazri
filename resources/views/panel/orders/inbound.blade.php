@extends('layouts.app2')
@section('title', 'Inbounds List')
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
                </div>
                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package" id="editableTable">
                            <thead>
                                <tr>
                                    <th>Order Image</th>
                                    <th>Order Code</th>
                                    <th>Date</th>
                                    <th>Payment Method</th>
                                    <th>Delivery Status</th>
                                    <th>Amount</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <img src="{{asset($order->product->first)}}" alt="users">
                                    </td>

                                    <td data-field="number">+{{$order->order_id}}</td>

                                    <td data-field="date">{{ \Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->format('d-m-Y')}}</td>

                                    <td data-field="text">{{$order->order->payment_method}}</td>
                                    @if ($order->status == 'pending')
                                    <td class="order-pending">
                                        
                                        @elseif ($order->status == 'taken')
                                        <td class="order-warning">
                                        @elseif ($order->status == 'delivered')
                                        <td class="order-success">
                                            @elseif ($order->status == 'canceled' || $order->status == 'returned')
                                            <td class="order-cancle">
                                            @elseif ($order->status == 'packaging')
                                            <td class="order-continue">
                                        
                                    @endif
                                        <span>{{$order->status}}</span>
                                    </td>

                                    <td data-field="number">{{$order->price}} OMR</td>

                                    <td>
                                        <a href="{{route('admin.orders.inbound.edit', $order->id)}}">
                                            <i class="fa fa-edit" title="Edit"></i>
                                        </a>

                                        <a href="javascript:void(0)">
                                            <i class="fa fa-trash" title="Delete"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $orders->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection