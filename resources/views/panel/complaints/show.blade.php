@extends('layouts.app2')
@section('title', __('adminBody.complaint'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="bg-inner cart-section order-details-table">
                        <div class="row g-4">
                            <div class="col-xl-8">
                                <div class="card-details-title">
                                    <h3><span> {{$complaint->subject}}</span></h3>
                                </div>
                                <div class="table-responsive table-details">
                                    <table class="table cart-table table-borderless">
                                        <thead>
                                            <tr>
                                                <th colspan="2">{{__('adminBody.complaint')}}</th>
                                                <th colspan="2">
                                                    @if ($complaint->status == 'pending')
                                        <span>{{__('body.Pending')}}</span>
                                        @elseif ($complaint->status == 'On-hold')
                                            <span>{{__('body.on_hold')}}</span>
                                        @elseif ($complaint->status == 'resolved')
                                        
                                            <span>{{__('body.resolved')}}</span>
                                            @elseif ($complaint->status == 'canceled' || $complaint->status == 'returned')
                    
                                            <span>{{__('body.canceled')}}</span>
                                    @endif    
                                                </th>
                                            </tr>
                                            
                                            
                                        </thead>

                                        <tbody>
                                            <tr class="table-order">
                                                <td>
                                                   <p>{!!$complaint->body!!}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection