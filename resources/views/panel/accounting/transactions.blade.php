@extends('layouts.app2')
@section('title', __('adminBody.TRANSACTIONS_LIST'))
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
                                    <th>{{ __('adminBody.Type') }}</th>
                                    <th>{{ __('adminBody.Account_Owner') }}</th>
                                    <th>{{ __('adminBody.Notes') }}</th>
                                    <th>{{ __('adminBody.Amount') }}</th>
                                    <th>{{ __('adminBody.Product_Id') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($transactions as $transaction) 
                                <tr>
                                    <td>#{{$transaction->order_id}}</td>

                                    <td>#{{$transaction->uuid}}</td>

                                    <td>{{$transaction->created_at}}</td>

                                    <td>{{$transaction->type}}</td>

                                    <td>{{$transaction->wallet ? $transaction->wallet->accountable->first_name : $transaction->wallet->accountable->name}}</td>

                                    <td>{{$transaction->notes}}</td>

                                    <td>{{$transaction->amount}}</td>
                                    @if ($transaction->product_id == null)
                                    <td>{{__('Order related transaction')}}</td>
                                    
                                    @else
                                        
                                    <td>{{$transaction->product->name}}</td>
                                    @endif
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {!! $transactions->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection