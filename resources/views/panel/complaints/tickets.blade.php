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
                                        
                                        @elseif ($complaint->status == 'On-hold')
                                        <td class="order-warning">
                                        @elseif ($complaint->status == 'resolved')
                                        <td class="order-success">
                                            @elseif ($complaint->status == 'canceled' || $complaint->status == 'returned')
                                            <td class="order-cancle">
                                            @elseif ($complaint->status == 'packaging')
                                            <td class="order-continue">
                                        
                                    @endif
                                        <span>{{$complaint->status}}</span>
                                    </td>
                                    <td>{{$complaint->admin ? $complaint->admin->name : '' }}</td>

                                    <td>
                                        <a href="{{route('admin.complaints.show', $complaint->id)}}">
                                            <i class="fa fa-edit" title="show"></i>
                                        </a>

                                        <a  href="javascript:void(0)">
                                            <i  data-id="{{$complaint->id}}" class="fa fa-check-square-o asign-ticket" title="Asgine an Admin"></i>
                                        </a>

                                        <a  href="javascript:void(0)">
                                            <i  data-id="{{$complaint->id}}" class="fa fa-dot-circle-o status-ticket" title="change status"></i>
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
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">Asign an Admin</h5>
            </div>
            <div class="modal-body">
                <form id="asign-ticket" action="#" method="POST" id="return-order-form">
                    @csrf
                    {{-- <input type="hidden" name="order_id" value="{{ $order->id }}"> --}}


                    <div class="form-group">
                        <label for="">Choose an Admin</label>
                        <div class="col-md-7">
                        <select class="js-example-basic-multiple form-control" name="admin_id" required>
                            <option value=""></option>
                            @foreach($admins as $id => $entry)
                            <option value="{{ $id }}">{{ $entry }}</option>
                        @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Request" class="btn btn-success">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="clsBtnFooter" data-dismiss="modal">Close</button>

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
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">Change the ticket status</h5>
            </div>
            <div class="modal-body">
                <form id="status-ticket" action="#" method="POST" id="return-ticket-form">
                    @csrf
                    {{-- <input type="hidden" name="order_id" value="{{ $order->id }}"> --}}


                    <div class="form-group">
                        <label for="">Choose a Status</label>
                        <div class="col-md-7">
                        <select class="js-example-basic-multiple form-control" name="status" required>
                            <option value=""></option>
                            @foreach($statuses as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Request" class="btn btn-success">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="clsBtnFooter" data-dismiss="modal">Close</button>

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