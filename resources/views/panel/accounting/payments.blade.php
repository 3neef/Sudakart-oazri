@extends('layouts.app2')
@section('title', __('adminBody.PAYMENTS_LIST'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                </div>

                <div class="card-body">
                    <div class="card-body order-datatable">
                    <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>{{ __('adminBody.Order_Id') }}</th>
                                    <th>{{ __('adminBody.Transaction_Id') }}</th>
                                    <th>{{ __('adminBody.date') }}</th>
                                    <th>{{ __('adminBody.customer_name') }}</th>
                                    <th>{{ __('adminBody.Notes') }}</th>
                                    <th>{{ __('adminBody.Amount') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($payments as $payment) 
                                <tr>
                                    <td>{{$payment->order_id}}</td>

                                    <td>#{{$payment->uuid}}</td>

                                    <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($payment->created_at))->format('d-m-Y')}}</td>

                                    <td>{{$payment->wallet ? $payment->wallet->accountable->first_name : $payment->wallet->accountable->name}}</td>

                                    <td>{{$payment->notes}}</td>

                                    <td>@money($payment->amount, 'OMR')</td>
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {!! $payments->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection