@extends('layouts.app2')
@section('title', __('adminNav.commissions'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">{{__('adminNav.comm_report')}}</a></li>
                    </ul>
                    @if ($errors->count() > 0)
                    {{$errors}}
                        
                    @endif
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="GET" action="{{route('admin.commissions-report.request')}}" class="needs-validation user-add">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span>{{__('adminBody.Vendors')}}</label>
                                    <div class="col-md-7">
                                        <div class="button-container" style=" margin-bottom: 10px;">
                                            <button type="button" onclick="selectAll()">{{ __('adminBody.Select_All') }}</button>
                                            <button type="button" onclick="deselectAll()">{{ __('adminBody.Deselect_All') }}</button>
                                        </div>
                                        <select class="js-example-basic-multiple form-control" name="vendors[]" multiple="multiple">
                                            @foreach($vendors as $id => $entry)
                                            <option value="{{ $id }}" {{ old('vendor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('adminBody.from')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="date_from" name="date_from" type="date"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('adminBody.to')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="date_to" name="date_to" type="date"
                                            required="">
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary" value="{{__('body.Choose')}}"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-details-title">
                        <h3>{{__('adminBody.total_comm')}} <span>@money($transactions->sum('amount') ,'OMR')</span></h3>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table trans-table all-package">
                                <thead>
                                    <tr>
                                        <th>{{ __('adminBody.Order_Id') }}</th>
                                        <th>{{ __('adminBody.Transaction_Id') }}</th>
                                        <th>{{ __('adminBody.date') }}</th>
                                        <th>{{ __('adminBody.Type') }}</th>
                                        <th>{{ __('adminBody.Account_Owner') }}</th>
                                        <th>{{ __('adminBody.Notes') }}</th>
                                        <th>{{ __('adminBody.Amount') }}</th>
                                        <th>{{ __('adminBody.Product_Name') }}</th>
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
    
                                        <td>{{$transaction->wallet ? $transaction->wallet->accountable->first_name : $transaction->wallet->accountable->name}}</td>
    
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
                    {!! $transactions->withQueryString()->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection