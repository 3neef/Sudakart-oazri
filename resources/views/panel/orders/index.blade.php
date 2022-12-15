@extends('layouts.app2')
@section('title',  __('adminNav.order_list'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    
                    <form action="{{ route('admin.order.search') }}" method="get" class="search-form" role="search" style="position: relative;">
                        <div class="input-group mb-3">
                            <input type="search" name="q"  placeholder="{{ __('labels.order_search') }}" class="input-group-field" 
                                autocomplete="off"> 
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">{{ __('body.search-btn') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                    <div class="table-responsive table-desi">
                        <table class="table all-package">
                        <thead>
                            <tr>
                                <th>{{ __('adminBody.Ref_No') }}</th>
                                <th>{{ __('adminBody.customer_name') }}</th>
                                <th>{{ __('adminBody.Product_Name') }}</th>
                                <th>{{ __('adminDash.payment_method') }}</th>
                                <th>{{ __('body.payment_status') }}</th>
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
                            <td>
                                @if ($order->payment)
                                @if ($order->payment->status == 'success')
                                <span class="badge badge-success">{{__('body.payment_success')}}</span>
                                @elseif ($order->payment->status == 'failed')
                                <span class="badge badge-primary">{{__('body.payment_failed')}}</span>
                                @else
                                <span class="badge badge-danger">{{__('body.payment_pending')}}</span>
                                @endif
                                @else
                                <span class="badge badge-danger">{{__('body.payment_pending')}}</span>
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
                                @if (auth()->user()->userable_type == 'App\Models\Admin' && $order->delivery_ref_id == null && $order->status != 'completed' && $order->status != 'canceled')
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
            </div>
             <div class="d-flex justify-content-center">
                    {!! $orders->links() !!}
                </div>
        </div>
    </div>
</div>



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="return-order-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">{{__('adminBody.order_status')}}</h5>
            </div>
            <div class="modal-body">
                <form id="asign-ticket" action="#" method="POST" id="return-order-form">
                    @csrf
                    <div class="form-group">
                        <label for="">{{__('body.Choose')}}</label>
                        <div class="col-md-7">
                        <select class="mySelect2 form-control" name="status" required>
                            <option value="completed">{{__('body.completed')}}</option>
                            <option value="canceled">{{__('body.canceled')}}</option>
                            <option value="in progress">{{__('body.in_progress')}}</option>
                            <option value="pending">{{__('body.Pending')}}</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="{{__('adminBody.save')}}" class="btn btn-outline-success">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" id="clsBtnFooter" data-dismiss="modal">{{__('body.Close')}}</button>

            </div>
        </div>
    </div>
</div>

{{-- model 2 --}}
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="return-ticket-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">{{__('adminBody.order_handling')}}</h5>
            </div>
            <div class="modal-body">
                <form id="status-ticket" action="#" method="POST" id="return-ticket-form">
                    @csrf
                   @method('put')

                    <div class="form-group">
                        <label for="">{{__('body.Choose')}}</label>
                        <div class="col-md-7">
                        <select class="mySelect2 form-control" name="handover" required>
                            <option value="0">{{ __('adminBody.self') }}</option>
                            <option value="1">{{ __('adminBody.party') }}</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="{{__('adminBody.save')}}" class="btn btn-success">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

{{-- end --}}

<script src="{{ asset('main/js/modal/order.js') }}" defer></script>
<script src="{{ asset('main/js/modal/ticket.js') }}" defer></script>

@endsection

@push('scripts')
<script>
    $('.asign-ticket').on('click',function () {  
        if($(this).closest().hasClass('disabled')) {
            alert('hi');
        }else {
            // alert('haaaay');
            var id = $(this).data('id');
            console.log(id);
            $('#asign-ticket').attr('action', '/admin/orders/status/'+id);
            $('#return-order-modal').modal('show');
        }
    
});
</script>
<script>
    $('.status-ticket').on('click',function () {  
    var id = $(this).data('id');
    console.log(id);
    $('#status-ticket').attr('action', '/admin/orders/handover/'+id);
    $('#return-ticket-modal').modal('show');
});
</script>
@endpush