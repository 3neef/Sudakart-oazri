@extends('main/layouts/app')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ __('body.Order_Details') }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{ __('body.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('body.order_history') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('body.Order_Details') }}</li>
                    </ol>
                </nav>
            </div>
            @include('main/partials/profile-menu')
            <div class="col-md-9">
                @if(session('orderDeleted'))
                    <div class="alert alert-success">
                        {{ session('orderDeleted') }}
                    </div>
                @endif
                @if(session('deletedFailed'))
                    <div class="alert alert-danger">
                        {{ session('deletedFailed') }}
                    </div>
                @endif
                <section class="section-b-space pt-0 ratio_asos">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="returned-message"></div>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="header-title">
                                            <h4 style="@if(app()->getLocale() == 'en')float: left; @else float: right; @endif ">{{ __('body.Order_Details') }}</h4>
                                            <div style="@if(app()->getLocale() == 'en')float: right; @else float: left; @endif">
                                                    
                                                   @if($order->status == 'pending')
                                                   <a href="{{ route('main.order.cancelOrder',$order->id) }}" class="btn btn-danger btn-sm rounded">{{ __('body.cancel_order') }}</a>
                                                   @endif
                                                   @if($order->status == 'completed')
                                                    <button class="btn btn-danger rounded btn-sm"
                                                        id="return-order-btn">{{ __('body.return_product') }}
                                                   </button>
                                                   @endif
                                                   
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                        <table class="table table-striped table-hovered">
                                            <thead>
                                                <th>#{{ __('body.refrence_number') }}</th>
                                                <th>{{ __('body.date') }}</th>
                                                <th>{{ __('body.product') }}</th>
                                                <th>{{ __('body.options') }}</th>
                                                <th>{{ __('body.quantity') }}</th>
                                                <th>{{ __('body.price') }}</th>
                                                <th>{{ __('body.payment_status') }}</th>
                                            </thead>
                                            <tbody>

                                                @foreach($order->newProduct as $one)
                                                <tr>

                                                    <td>{{ $one->pivot->id }}</td>
                                                    <td>{{ $one->pivot->created_at }}</td>
                                                    <td>{{ $one->en_name }}</td>
                                                    <td>
                                                       
                                                       @forelse(\App\Models\Product::getOptions($order->id,$one->pivot->product_id) as $op)
                                                         @if($op->name)
                                                         @if(app()->getLocale() == 'en')
                                                            <div>{{ $op->en_name }} : {{ $op->en_option }} </div>
                                                         @else 
                                                            <div>{{ $op->name }} : {{ $op->option }} </div>
                                                         @endif
                                                         @endif
                                                       @empty
                                                        {{ __('body.no_options') }}
                                                       @endforelse
                                                    </td>
                                                    <td>{{ $one->pivot->quantity }}</td>
                                                    <td>{{ number_format($one->pivot->price * $one->pivot->quantity,2) }}
                                                    </td>
                                                    <td>
                                                        @if ($order->payment)
                                                        {{ $order->payment->status }}
                                                        @else
                                                        {{ __('body.Pending') }}
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        </div>
                                        
                                    </div>
                                    <div class="card-footer">

                                    </div>
                                </div>
                            </div>
                            {{-- {{ dd($delivery) }} --}}
                            @if ($delivery['status'] != 0)
                            <div class="col-lg-12 mt-3">
                                <div id="returned-message"></div>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="header-title">
                                            <h4 style="@if(app()->getLocale() == 'en')float: left; @else float: right; @endif">{{ __('body.Delivery_Details') }}</h4>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hovered">
                                            <thead>
                                                <th>#{{ __('body.refrence_number') }}</th>
                                                <th>{{ __('body.phone') }}</th>
                                                <th>{{ __('body.address') }}</th>
                                                <th>{{ __('body.cash') }}</th>
                                                <th>{{ __('body.status') }}</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $delivery['data']['ref_no'] }}</td>
                                                    <td>
                                                        {{ $delivery['data']['phone'] }}
                                                    </td>
                                                    <td>
                                                        {{ $delivery['data']['region'] . ' , ' .
                                                        $delivery['data']['address'] }}
                                                    </td>
                                                    <td>
                                                        {{ $delivery['data']['price'] }}
                                                    </td>
                                                    <td>
                                                        @if ($order->status == 'pending' )
                                                        {{ __('body.Pending') }}
                                                        @elseif ($order->status == 'in progress')
                                                        {{ __('body.in_progress') }}
                                                        @elseif ($order->status == 'completed')
                                                        {{ __('body.order_completed') }}
                                                        @elseif ($order->status == 'canceled')
                                                        {{ __('body.canceled') }}
                                                        @endif
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="card-footer">

                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="return-order-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">Choose A Product To Return</h5>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="return-order-form">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <div class="form-group">
                        <label for="">Choose Product</label>
                        <select name="order_product_id" class="form-control" required>
                            <option value=""></option>
                            @foreach($order->newProduct as $one)
                            <option value="{{ $one->pivot->id }}">{{ $one->en_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Choose a reason</label>
                        <select name="reason_id" class="form-control" required>
                            <option value=""></option>
                            @foreach($reasons as $reason)
                            <option value="{{ $reason->en_name }}">{{ $reason->en_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Request" class="btn btn-danger">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="clsBtnFooter" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<script src="{{ asset('main/js/modal/order.js') }}" defer></script>
@endsection