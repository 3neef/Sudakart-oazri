@extends('layouts.app2')
@section('title', 'Inbounds List')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">{{__('adminNav.expenses_report')}}</a></li>
                    </ul>
                    @if ($errors->count() > 0)
                    {{$errors}}
                        
                    @endif
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="GET" action="{{route('admin.expenses-report.request')}}" class="needs-validation user-add">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span>{{__('body.expense_type')}}</label>
                                    <div class="col-md-7">
                                        <select class="js-example-basic-multiple form-control" name="driver_id" multiple="multiple">
                                            {{-- @foreach($types as $id => $entry)
                                            <option value="{{ $id }}" {{ old('type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary" value="{{__('adminBody.save')}}"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('admin.orders.inbound.drivers')}}" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive table-desi">
                            <table class="table all-package" id="editableTable">
                                <thead>
                                    <tr>
                                        <th><input id="selectAll" type="checkbox"></th>
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
                                        <td><input name="ids[]" value="{{ $order->id }}" type="checkbox" ></td>
                                        <td>
                                            <img src="{{asset($order->product->first)}}" alt="pics">
                                        </td>

                                        <td data-field="number">+{{$order->order_id}}</td>

                                        <td data-field="date">{{ \Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->format('d-m-Y')}}</td>

                                        <td data-field="text">
                                            @if ($order->order->payment_method == 'online')
                                            <span class="badge badge-secondary">{{ __('body.online') }}</span>
                                            @elseif($order->order->payment_method == 'bank')
                                            <span class="badge badge-dark">{{ __('body.bank_transfer') }}</span>
                                            @else
                                            <span class="badge badge-danger">{{ __('body.cash') }}</span>
                                            @endif  
                                        </td>
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

                                        <td data-field="number">@money($order->price ,'OMR')</td>

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
</div>
@endsection


@push('scripts')
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