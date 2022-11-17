@extends('layouts.app2')
@section('title', __('adminBody.WALLETS_LIST'))
@if (Auth::user()->userable_type == 'App\Models\Vendor')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="bg-inner cart-section order-details-table">
                        <div class="row g-4">
                            <div class="col-max">
                                <div class="card-details-title">
                                    <h3>{{ __('adminBody.Your_Wallet_Balance_is') }}    <span>{{$wallets->total_balance}} OMR</span></h3>
                                </div>
                                <div class="table-responsive table-desi">
                                    <table class="table trans-table all-package">
                                        <thead>
                                            <tr>
                                                <th>{{ __('adminBody.Order_Id') }}</th>
                                                <th>{{ __('adminBody.Transaction_Id') }}</th>
                                                <th>{{ __('adminBody.date') }}</th>
                                                <th>{{ __('adminBody.Type') }}</th>
                                                <th>{{ __('adminBody.Wallet_Id') }}</th>
                                                <th>{{ __('adminBody.Notes') }}</th>
                                                <th>{{ __('adminBody.Amount') }}</th>
                                                <th>{{ __('adminBody.Product_Id') }}</th>
                                            </tr>
                                        </thead>
            
                                        <tbody>
                                            @foreach ($transactions as $transaction) 
                                            <tr>
                                                <td>{{$transaction->id}}</td>
            
                                                <td>#{{$transaction->uuid}}</td>
            
                                                <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($transaction->created_at))->format('d-m-Y')}}</td>
            
                                                <td>{{$transaction->type}}</td>
            
                                                <td>{{$transaction->wallet_id}}</td>
            
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


                        </div>
                    </div>
                    <!-- section end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    
@else
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
                                    <th>{{ __('adminBody.Wallet_Id') }}</th>
                                    <th>{{ __('adminBody.Account_Owner') }}</th>
                                    <th>{{ __('adminBody.Balance') }}</th>
                                    <th>{{ __('adminBody.date') }}</th>
                                    <th>{{ __('adminBody.Actions') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($wallets as $wallet)
                                <tr>
                                    <td>{{$wallet->id}}</td>

                                    <td>{{$wallet->accountable ? $wallet->accountable->first_name : 'invalid name'}}</td>

                                    <td>{{$wallet->balance}}  OMR</td>

                                    <td>{{$wallet->created_at}}</td>
                                    
                                    <td>
                                        <a href="{{route('admin.accounting.wallets.operation', $wallet->id)}}">
                                            <i class="fa fa-edit fa-2x" title="operations"></i>
                                        </a>
                                        <a href="{{route('admin.accounting.wallets.history', $wallet->id)}}">
                                            <i class="fa fa-history fa-2x" title="history"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="d-flex justify-content-center">
                    {!! $wallets->links() !!}
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
@endif