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
                    <div class="card-details-title">
                        <h3>{{__('body.wallet_records')}} <span>{{$transactions->first()->wallet ? $transactions->first()->wallet->accountable->first_name : $transactions->first()->wallet->accountable->name}}</span></h3>
                    </div>
                   <div class="card-body order-datatable">
                    <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>{{ __('adminBody.Order_Id') }}</th>
                                    <th>{{ __('adminBody.Transaction_Id') }}</th>
                                    <th>{{ __('adminBody.date') }}</th>
                                    <th>{{ __('adminBody.Type') }}</th>
                                    <th>{{ __('adminBody.Notes') }}</th>
                                    <th>{{ __('adminBody.Amount') }}</th>
                                    <th>{{ __('adminBody.Product_Id') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($transactions as $transaction) 
                                <tr>
                                    <td>#{{$transaction->order_id}}</td>

                                    <td>tran_{{base_convert(md5($transaction->uuid), 2, 8)}}</td>

                                    <td>{{$transaction->created_at}}</td>

                                    <td>
                                        <span
                                            class=" badge
                                            @if ($transaction->type == 'refund')
                                                badge-danger
                                            @elseif($transaction->type == 'payment')
                                                badge-info
                                            @elseif ($transaction->type == 'deposit')
                                                badge-success
                                            @elseif ($transaction->type == 'withdraw')
                                                badge-primary
                                            @endif
                                                ">
                                                @if ($transaction->type == 'refund' )
                                                {{ __('body.refund') }}
                                                @elseif ($transaction->type == 'payment')
                                                {{ __('body.payment') }}
                                                @elseif ($transaction->type == 'deposit')
                                                {{ __('body.deposit') }}
                                                @elseif ($transaction->type == 'withdraw')
                                                {{ __('body.withdraw') }}
                                                @endif
                                        </span>
                                    </td>

                                    <td>{{$transaction->notes}}</td>

                                    <td>@money($transaction->amount, 'OMR')</td>
                                    @if ($transaction->product_id == null)
                                    @if(app()->getLocale() == 'en')
                                    <td>{{__('Not product related transaction')}}</td>
                                    @else
                                    <td>{{__('التحويلة عير مرتبطة بمنتج')}}</td>
                                    @endif
                                    
                                    
                                    @else
                                    @if(app()->getLocale() == 'en')
                                    <td>{{$transaction->product->en_name}}</td>
                                    @else
                                    <td>{{$transaction->product->name}}</td>
                                    @endif
                                    
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