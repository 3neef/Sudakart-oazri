@extends('layouts.app2')
@section('title', 'Show Order Detail')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
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
                                                <th>{{ __('body.quantity') }}</th>
                                                <th>{{ __('body.price') }}</th>
                                                @if(auth()->user()->userable_type == 'App\Models\Admin')
                                                <th>{{ __('body.payment_status') }}</th>
                                                @endif
                                            </thead>
                                            <tbody>

                                                @foreach($order->newProduct as $one)
                                                <tr>

                                                    <td>{{ $one->pivot->id }}</td>
                                                    <td>{{ $one->pivot->created_at }}</td>
                                                    <td>{{ $one->en_name }}</td>
                                                    <td>{{ $one->pivot->quantity }}</td>
                                                    <td>{{ number_format($one->pivot->price * $one->pivot->quantity,2) }}
                                                    </td>
                                                    @if(auth()->user()->userable_type == 'App\Models\Admin')
                                                    <td>
                                                        @if ($order->payment)
                                                        {{ $order->payment->status }}
                                                        @else
                                                        {{ __('body.Pending') }}
                                                        @endif
                                                    </td>
                                                    @endif
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
                            @if (auth()->user()->userable_type == 'App\Models\Admin' && $delivery['status'] != 0)
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
                                                <th>{{ __('body.address') }}</th>
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
@endsection