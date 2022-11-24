@extends('layouts.app2')
@section('title', __('adminBody.TICKETS_LIST'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-inline search-form search-box">
                        
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package">
                            <thead>
                                <tr>
                                    <th>{{ __('adminBody.Ticket_Number') }}</th>
                                    <th>{{ __('adminBody.date') }}</th>
                                    <th>{{ __('adminBody.Subject') }}</th>
                                    <th>{{ __('adminBody.Status') }}</th>
                                    <th>{{ __('adminBody.Name') }}</th>
                                    <th>{{ __('adminBody.option') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($complaints as $complaint)
                                <tr>
                                    <td>#{{$complaint->id}}</td>

                                    <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($complaint->created_at))->format('d-m-Y')}}</td>

                                    <td>{{$complaint->subject}}</td>
                                    @if ($complaint->status == 'pending')
                                        <td class="order-pending">
                                        <span>{{__('body.Pending')}}</span>
                                        @elseif ($complaint->status == 'On-hold')
                                        <td class="order-warning">
                                            <span>{{__('body.on_hold')}}</span>
                                        @elseif ($complaint->status == 'resolved')
                                        <td class="order-success">
                                            <span>{{__('body.resolved')}}</span>
                                            @elseif ($complaint->status == 'canceled' || $complaint->status == 'returned')
                                            <td class="order-cancle">
                                            <span>{{__('body.canceled')}}</span>
                                    @endif
                                    </td>
                                    <td>{{$complaint->admin ? $complaint->admin->name : '' }}</td>

                                    <td>
                                        <a href="{{route('admin.complaints.show', $complaint->id)}}">
                                            <i class="fa fa-eye" title="{{__('body.show')}}"></i>
                                        </a>

                                        <a  href="javascript:void(0)">
                                            <i  data-id="{{$complaint->id}}" class="fa fa-check-square-o asign-ticket"
                                                @if (app()->getLocale() == 'en')
                                                title="Asgine an Admin">
                                                
                                                @else
                                                title="إسناد إالى مشرف">
                                                    
                                                @endif
                                                
                                            </i>
                                        </a>

                                        <a  href="javascript:void(0)">
                                            <i  data-id="{{$complaint->id}}" class="fa fa-dot-circle-o status-ticket" title="{{__('body.status')}}"></i>
                                        </a>
                                    </td>
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- modal --}}

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="return-order-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">
                    @if (app()->getLocale() == 'en')
                                                Asgine an Admin
                                                
                                                @else
                                                إسناد إالى مشرف
                                                    
                                                @endif
                </h5>
            </div>
            <div class="modal-body">
                <form id="asign-ticket" action="#" method="POST" id="return-order-form">
                    @csrf
                    {{-- <input type="hidden" name="order_id" value="{{ $order->id }}"> --}}


                    <div class="form-group">
                        <label for="">{{__('body.Choose')}}</label>
                        <div class="col-md-7">
                        <select class="form-control" name="admin_id" style="width: 100%" id="select2_modal" required>
                            <option value=""></option>
                            @foreach($admins as $id => $entry)
                            <option value="{{ $id }}">{{ $entry }}</option>
                        @endforeach
                        </select>
                        </div>
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

{{-- model 2 --}}
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="return-ticket-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">{{__('adminBody.ticket_status')}}</h5>
            </div>
            <div class="modal-body">
                <form id="status-ticket" action="#" method="POST" id="return-ticket-form">
                    @csrf
                    {{-- <input type="hidden" name="order_id" value="{{ $order->id }}"> --}}


                    <div class="form-group">
                        <label for="">{{__('body.Choose')}}</label>
                        <div class="col-md-7">
                        <select class="form-control" name="status" style="width: 100%" required>
                            <option value=""></option>
                            @foreach($statuses as $status)
                            <option value="{{ $status }}">
                                @if ($status == 'pending')
                                        {{__('body.Pending')}}
                                        @elseif ($status == 'On-hold')
                                        {{__('body.on_hold')}}
                                        @elseif ($status == 'resolved')
                                        {{__('body.resolved')}}
                                        @elseif ($status == 'canceled')
                                        {{__('adminBody.cancel')}}
                                @endif    
                            </option>
                        @endforeach
                        </select>
                        </div>
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

{{-- end --}}

<script src="{{ asset('main/js/modal/order.js') }}" defer></script>
<script src="{{ asset('main/js/modal/ticket.js') }}" defer></script>
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
    });
        $('.asign-ticket').on('click',function () {  
        var id = $(this).data('id');
        console.log(id);
        $('#asign-ticket').attr('action', '/admin/complaints/ticket/'+id);
        $('#return-order-modal').modal('show');
    });
    </script>

    <script>
        $('.status-ticket').on('click',function () {  
        var id = $(this).data('id');
        console.log(id);
        $('#status-ticket').attr('action', '/admin/complaints/ticket/'+id);
        $('#return-ticket-modal').modal('show');
    });
    </script>
@endpush