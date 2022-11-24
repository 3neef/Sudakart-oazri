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
                <div class="table-responsive table-desi">
                    <table class="table all-package">
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
                                    @foreach ($order->products->take(3) as $product )
                                        <img src="{{asset($product->product->first)}}" alt=""
                                            class="img-fluid img-30 me-2 blur-up lazyloaded">
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                @if ($order->payment_method == 'online')
                                <span class="badge badge-secondary">{{ __('body.online') }}</span>
                                @elseif($order->payment_method == 'bank')
                                <span class="badge badge-dark">{{ __('body.bank_transfer') }}</span>
                                @else
                                <span class="badge badge-danger">{{ __('body.cash') }}</span>
                                @endif
                            </td>
                            <td>{{$order->delivery_amount}}</td>
                            <td>
                                <span data-id="{{$order->id}}" 
                                    class=" badge
                                    @if ($order->status == 'pending')
                                        badge-danger
                                    @elseif($order->status == 'in progress')
                                        badge-info
                                    @elseif ($order->status == 'completed')
                                        badge-success
                                    @elseif ($order->status == 'canceled')
                                        badge-primary
                                    @endif
                                        asign-ticket">
                                        @if ($order->status == 'pending' )
                                        {{ __('body.Pending') }}
                                        @elseif ($order->status == 'in progress')
                                        {{ __('body.in_progress') }}
                                        @elseif ($order->status == 'completed')
                                        {{ __('body.completed') }}
                                        @elseif ($order->status == 'canceled')
                                        {{ __('body.canceled') }}
                                        @endif
                                </span>    
                            </td>
                            <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->format('d-m-Y')}}</td>
                            <td>@money($order->total, 'OMR')</td>
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