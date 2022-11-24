@extends('layouts.app2')
@section('title', __('adminBody.Resolved_Tickets'))
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
                                    <td>
                                        <a href="{{route('admin.complaints.show', $complaint->id)}}">
                                            <i class="fa fa-eye" title="{{__('body.show')}}"></i>
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
@endsection