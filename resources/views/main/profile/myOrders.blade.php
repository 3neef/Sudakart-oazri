@extends('main/layouts/app')
@section('content')
 <!-- breadcrumb start -->
 <div class="breadcrumb-section bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ __('body.order_history') }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{ __('body.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('body.order_history') }}</li>
                    </ol>
                </nav>
            </div>
            @include('main/partials/profile-menu')
            <div class="col-md-9">
                
                <section class="section-b-space pt-0 ratio_asos">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="header-title">
                                        <h4>{{ __('body.order_history') }}</h4>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-hovered">
                                        <thead>
                                           
                                            <th>#{{ __('body.refrence_number') }}</th>
                                            <th>{{ __('body.date') }}</th>
                                            <th>{{ __('body.products') }}</th>
                                            <th>{{ __('body.total') }}</th>
                                            <th>{{ __('body.delivary_price') }}</th>
                                            <th>{{ __('body.payment_status') }}</th>
                                            <th>{{ __('adminBody.Actions') }}</th>
                                                
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>{{ $order->new_product_count }}</td>
                                                <td>{{ $order->total }}</td>
                                                <td>{{ $order->delivery_amount }}</td>
                                                <td>
                                                    @if ($order->payment)
                                                        {{ $order->payment->status == 'failed' ? __('body.canceled') : $order->payment->status }}
                                                    @elseif($order->payment_method == 'cash')
                                                        {{ __('body.cash') }}
                                                        @else
                                                        {{ __('body.Pending') }}
                                                    @endif
                                                </td>
                                                <th>
                                                    @if ($order->payment)
                                                    @if ($order->payment->status != 'success')
                                                    <a href="{{ route('checkout.payment.paynow',$order->id)
                                                     }}" class="btn btn-success rounded">
                                                     {{ __('body.PAY_NOW') }}
                                                    </a>
                                                    @endif
                                                    @endif
                                                    
                                                    <a href="{{ route('profile.myOrder.orderDetails',$order->id) }}" class="btn btn-primary rounded">{{ __('body.details') }}</a>
                                                </th>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                    
                                </div>
                                <div class="card-footer">
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
@endsection