@extends('layouts.app2')
@section('title', 'Outbound List')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">{{__('adminNav.regions')}}</a></li>
                    </ul>
                    @if ($errors->count() > 0)
                    {{$errors}}
                        
                    @endif
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="GET" action="{{route('admin.orders.MarketInbound')}}" class="needs-validation user-add">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span>{{__('body.region')}}</label>
                                    <div class="col-md-7">
                                            <select class="form-control" name="market_id" style="width: 100%" id="marketId" required>
                                                <option value=""></option>
                                            </select>
                                        </select>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary" value="{{__('body.search-btn')}}"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <form method="POST" action="{{route('admin.orders.inbound.drivers')}}" class="needs-validation" enctype="multipart/form-data">
                    @csrf
                <div class="table-responsive table-desi">
                    <table class="table all-package">
                    <thead>
                        <tr>
                            <th><input id="selectAll" type="checkbox"></th>
                            <th>{{ __('adminBody.Ref_No') }}</th>
                            <th>{{ __('adminBody.customer_name') }}</th>
                            <th>{{ __('adminBody.Product_Name') }}</th>
                            <th>{{ __('adminDash.payment_method') }}</th>
                            <th>{{ __('adminBody.delivery_amount') }}</th>
                            <th>{{ __('adminBody.order_status') }}</th>
                            <th>{{ __('adminBody.date') }}</th>
                            <th>{{ __('adminBody.total') }}</th>
                            <th>{{ __('adminBody.Approved') }}</th>
                            <th>{{ __('adminBody.manage') }}</th>
                            <th>{{ __('adminBody.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        
                    <tr>
                        <td><input name="ids[]" value="{{ $order->id }}" type="checkbox" ></td>
                        <td>#{{$order->id}}</td>
                        <td>{{$order->customer ? $order->customer->name : 'deleted'}}</td>
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
                            <a  href="javascript:void(0)"  class="{{$order->handover == 1 ? 'disabled' : '' }}" style="{{$order->handover == 1 ? 'pointer-events: none;' : '' }}">
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
                            </a>
                        </td>
                        <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->format('d-m-Y')}}</td>
                        <td>
                            @if (auth()->user()->userable_type == 'App\Models\Admin')
                            @money($order->total,'OMR')
                            @else
                            @money($order->vendor_total , 'OMR')
                            @endif
                        </td>
                        @if ($order->approved == true)
                        <td class="td-check">
                            <i data-feather="check-circle"></i>
                        </td>
                            
                        @else
                            
                        <td class="td-cross">
                            <i data-feather="x-circle"></i>
                        </td>
                        @endif
                        <td>
                            <span
                                class=" badge
                                @if ($order->handover == 0)
                                    badge-danger
                                @elseif($order->handover == 1)
                                    badge-info
                                @endif
                                    ">
                                @if ($order->handover == 0)
                                {{ __('adminBody.self') }}
                                @elseif($order->handover == 1)
                                {{ __('adminBody.party') }}
                                @endif
                            </span>
                        </td>
                        <td>
                            <div style="display: flex;">
                            @if (auth()->user()->userable_type == 'App\Models\Admin' && $order->delivery_ref_id == null && $order->status != 'completed' && $order->status != 'canceled' && Str::contains($order->region_id, 'region_') == false)
                            <a class=" mx-1 btn btn-success" href="javascript:void(0)" style="padding: 5px 5px;">
                                <i  data-id="{{$order->id}}" class="fa fa-dot-circle-o px-1 status-ticket" title="{{__('adminBody.order_handling')}}"></i>
                            </a>
                            @endif
                            @if (auth()->user()->userable_type == 'App\Models\Admin' && $order->approved == 0 && $order->status == 'completed')
                            <a class=" mx-1 btn btn-success" href="{{route('admin.orders.approve', $order->id)}}" aria-label="Approve Order" style="padding: 5px 5px;">
                                <i class="fa fa-check-circle px-1" aria-hidden="true" title="{{__('adminBody.approve')}}"></i>
                            </a>
                            @endif
                            <a class=" mx-1 btn btn-warning" href="{{route('admin.orders.show', $order->id)}}" aria-label="Show Order" style="padding: 5px 5px;">
                                <i class="fa fa-eye  px-1" aria-hidden="true" title="{{__('body.show')}}"></i>
                            </a>
                            @if (auth()->user()->userable_type == 'App\Models\Admin')
                            @if ($order->status == 'pending')
                            <a class=" mx-1 btn btn-primary" href="{{route('admin.orders.cancel', $order->id)}}" aria-label="Cancel Order" style="padding: 5px 5px;">
                                <i class="fa fa-ban  px-1" aria-hidden="true" title="{{__('body.cancel_order')}}"></i>
                            </a>
                            @endif
                            @if ($order->status != 'canceled' && $order->handover == 1 && $order->delivery_ref_id == null && Str::contains($order->region_id, 'region_') == false)
                            <a class=" mx-1 btn btn-info" href="{{route('admin.orders.sendtoDelivery', $order->id)}}" aria-label="Send Order To Delivery" style="padding: 5px 5px;">
                                <i class="fa fa-paper-plane  px-1" aria-hidden="true" title="{{__('adminBody.delivery')}}"></i>
                            </a>
                            @endif

                            <a class=" mx-1 btn btn-secondary" href="{{route('admin.orders.print', $order->id)}}" aria-label="Order Recipt" style="padding: 5px 5px;">
                                <i class="fa fa-file-text-o  px-1" aria-hidden="true" title="{{__('adminBody.Download_Receipt')}}"></i>
                            </a>
                            @endif

                            </div>
                            
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="form-group row mt-5">
                <label class="col-xl-3 col-md-4"><span>*</span>{{__('adminBody.dirvers')}}</label>
                <div class="col-md-7">
                        <select class="form-control" name="driver_id" style="width: 100%" id="driverId" required>
                            <option value=""></option>
                        </select>
                    </select>
                </div>
            </div>
            <div class="pull-right">
                <button type="submit" class="btn btn-primary">{{__('adminBody.save')}}</button>
            </div>
            </form>
        </div>
        <div class="d-flex justify-content-center">
            {!! $orders->links() !!}
        </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            
            var dir = "{{app()->getLocale()}}";
            var lang = "";

            if(dir == 'en')
            {
                lang = 'ltr';
            }else{
                lang = 'rtl';
            }

            $('#marketId').select2({
            dir:lang, 
            ajax : {
                url: "{{ route('admin.markets.getcities') }}",
                type : "get" ,
                dataType : "json",
                data : function (params) {
                    return {
                        search : params.term
                    };
                } ,
                processResults: function (response) {
                    return{
                    results : response
                    };
                },
                cache: true
                }
            });
            $('#driverId').select2({
            dir:lang, 
            ajax : {
                url: "{{ route('admin.markets.getdrivers') }}",
                type : "get" ,
                dataType : "json",
                data : function (params) {
                    return {
                        search : params.term
                    };
                } ,
                processResults: function (response) {
                    return{
                    results : response
                    };
                },
                cache: true
                }
            });
        });
    </script>
    <script>
        $("#selectAll").click(function() {
            $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
            });

            $("input[type=checkbox]").click(function() {
            if (!$(this).prop("checked")) {
                $("#selectAll").prop("checked", false);
            }
        });
    </script>
@endpush