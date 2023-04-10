
@extends('layouts.app2')
@section('title', __('body.Order_Details'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    @if(auth()->user()->userable_type == 'App\Models\Admin')
                    <a href="javascript:void(0)" class="btn btn-primary mt-md-0 mt-2 asign-ticket">
                        {{ __('adminBody.new_product') }}
                    </a>
                    @endif
                </div>
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
                                                <th>{{ __('body.options') }}</th>
                                                <th>{{ __('body.quantity') }}</th>
                                                <th>{{ __('body.price') }}</th>
                                                @if(auth()->user()->userable_type == 'App\Models\Admin')
                                                <th>{{ __('body.payment_status') }}</th>
                                                <th>{{ __('adminBody.Actions') }}</th>
                                                @endif
                                            </thead>
                                            <tbody>

                                                @foreach($order->newProduct as $one)
                                                <tr>

                                                    <td>{{ $one->pivot->id }}</td>
                                                    <td>{{ $one->pivot->created_at }}</td>
                                                    <td>
                                                        @if(app()->getLocale() == 'en')
                                                        {{ $one->en_name }}
                                                        @else
                                                        {{ $one->name }}
                                                        @endif    
                                                    </td>
                                                    <td>
                                                    
                                                        @forelse(\App\Models\Product::getOptions($order->id,$one->pivot->product_id) as $op)
                                                        @if($op->name)
                                                        @if(app()->getLocale() == 'en')
                                                            <div>{{ $op->en_name }} : {{ $op->en_option }} </div>
                                                        @else 
                                                            <div>{{ $op->name }} : {{ $op->option }} </div>
                                                        @endif
                                                        @else
                                                        {{ __('body.no_options') }}
                                                        @endif
                                                        @empty
                                                        {{ __('body.no_options') }}
                                                        
                                                        @endforelse
                                                    </td>
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
                                                    <td>
                                                        <a href="{{route('admin.products.deleteItem', $one->pivot->id)}}">
                                                            <i style="color: red;" class="fa fa-trash" title="{{ __('body.delete') }}"></i>
                                                        </a>
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


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="return-order-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">
                    @if (app()->getLocale() == 'en')
                                                Add a Product
                                                
                                                @else
                                                إضافة منتج
                                                    
                                                @endif
                </h5>
            </div>
            <div class="modal-body">
                <form id="asign-ticket" action="{{route('admin.products.newItem')}}" method="POST" id="return-order-form">
                    @csrf
                    @method('PUT')
                     <input type="hidden" name="order_id" value="{{ $order->id }}">


                    <div class="form-group">
                        <label for="">{{__('body.Choose')}}</label>
                        <div class="col-md-7">
                        <select class="form-control" name="product_id" style="width: 100%" id="stockId" required>
                            <option value=""></option>
                        </select>
                        </div>
                    </div>
                    <div id="product-options">

                    </div>

                    <div class="form-group">
                        <input type="submit" value="{{__('adminBody.save')}}" class="btn btn-success">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="clsBtnFooter" data-dismiss="modal">{{__('body.Close')}}</button>

            </div>
        </div>
    </div>
</div>

<script src="{{ asset('main/js/modal/order.js') }}" defer></script>

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

        $('#select2_modal').select2({
            dropdownParent: $('#return-order-modal'),
            dir:lang 
        });
            $('#stockId').select2({
            dropdownParent: $('#return-order-modal'),
            dir:lang, 
            ajax : {
                url: "{{ route('admin.products.getProducts') }}",
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

            $('#stockId').on('change', function(){
                var id = $(this).val();
                $.ajax({
                    url : "{{ route('admin.products.getOptions') }}",
                    data:{product_id:id},
                    success:function(result){
                        if(result.length > 0){
                            $('#product-options').html(result);
                        }else {
                            $('#product-options').html('no options');
                        }
                        
                    }
                });
            });
    });
        $('.asign-ticket').on('click',function () {  
        $('#return-order-modal').modal('show');
    });
    </script>

@endpush