@extends('layouts.app2')
@section('title',  __('adminNav.order_list'))
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
                                <th>{{ __('adminBody.customer_name') }}</th>
                                <th>{{ __('adminBody.Product_Name') }}</th>
                                <th>{{ __('adminDash.payment_method') }}</th>
                                <th>{{ __('adminBody.delivery_amount') }}</th>
                                <th>{{ __('adminBody.order_status') }}</th>
                                <th>{{ __('adminBody.date') }}</th>
                                <th>{{ __('adminBody.total') }}</th>
                                <th>{{ __('adminBody.Approved') }}</th>
                                <th>{{ __('adminBody.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            
                        <tr>
                            <td>#{{$order->id}}</td>
                            <td>{{$order->customer->name}}</td>
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
                                    
                                <span class="badge badge-secondary">{{$order->payment_method}}</span>
                                @else
                                
                                <span class="badge badge-danger">{{$order->payment_method}}</span>
                                @endif
                            </td>
                            <td>{{$order->delivery_amount}}</td>
                            <td>
                                <a  href="javascript:void(0)">
                                    <span data-id="{{$order->id}}" class="badge badge-success asign-ticket">{{$order->status}}</span>
                                </a>
                            </td>
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
                            <td>
                                <div style="display: flex;">
                                @if (auth()->user()->userable_type == 'App\Models\Admin' && $order->approved == 0 && $order->status == 'completed')
                                <a class=" mx-1 btn btn-success" href="{{route('admin.orders.approve', $order->id)}}" aria-label="Approve Order" style="padding: 5px 5px;">
                                    <i class="fa fa-check-circle px-1" aria-hidden="true" title="Approve Order"></i>
                                </a>
                                @endif
                                <a class=" mx-1 btn btn-warning" href="{{route('admin.orders.show', $order->id)}}" aria-label="Show Order" style="padding: 5px 5px;">
                                    <i class="fa fa-eye  px-1" aria-hidden="true" title="Show Order"></i>
                                </a>
                                @if (auth()->user()->userable_type == 'App\Models\Admin')
                                @if ($order->status != 'canceled')
                                <a class=" mx-1 btn btn-primary" href="{{route('admin.orders.cancel', $order->id)}}" aria-label="Cancel Order" style="padding: 5px 5px;">
                                    <i class="fa fa-ban  px-1" aria-hidden="true" title="Cancel Order"></i>
                                </a>
                                @endif
                                @if ($order->status != 'canceled' && $order->approved == 1)
                                <a class=" mx-1 btn btn-info" href="{{route('admin.orders.sendtoDelivery', $order->id)}}" aria-label="Send Order To Delivery" style="padding: 5px 5px;">
                                    <i class="fa fa-paper-plane  px-1" aria-hidden="true" title="Send Order To Delivery"></i>
                                </a>
                                @endif

                                <a class=" mx-1 btn btn-secondary" href="{{route('admin.orders.print', $order->id)}}" aria-label="Order Recipt" style="padding: 5px 5px;">
                                    <i class="fa fa-file-text-o  px-1" aria-hidden="true" title="Order Recipt"></i>
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
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">Change order status</h5>
            </div>
            <div class="modal-body">
                <form id="asign-ticket" action="#" method="POST" id="return-order-form">
                    @csrf
                    <div class="form-group">
                        <label for="">Change Status</label>
                        <div class="col-md-7">
                        <select class="mySelect2 form-control" name="status" required>
                            <option value="completed">completed</option>
                            <option value="canceled">canceled</option>
                            <option value="in progress">in progress</option>
                            <option value="pending">Pending</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-outline-success">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" id="clsBtnFooter" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<script src="{{ asset('main/js/modal/order.js') }}" defer></script>

@endsection

@push('scripts')
<script>
    $('.asign-ticket').on('click',function () {  
    var id = $(this).data('id');
    console.log(id);
    $('#asign-ticket').attr('action', '/admin/orders/status/'+id);
    $('#return-order-modal').modal('show');
});
</script>
@endpush