@extends('layouts.app2')
@section('title', __('adminBody.SUSPENDED_VENDORS_LIST'))
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body order-datatable">
            <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th>{{ __('adminBody.Vendor') }}</th>
                        <th>{{ __('adminBody.products') }}</th>
                        <th>{{ __('adminBody.Store_Name') }}</th>
                        <th>{{ __('adminBody.join') }}</th>
                        <th>{{ __('adminBody.Wallet_Balance') }}</th>
                        <th>{{ __('adminBody.Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vendors as $vendor)
                    <tr>
                        <td>
                            <div class="d-flex vendor-list">
                                <span>{{$vendor->first_name}}</span>
                            </div>
                        </td>
                        <td>{{$vendor->count}}</td>
                        @if ($vendor->shop)
                        @if (app()->getLocale() == 'en')
                        <td>{{$vendor->shop->shop_en_name}}</td>
                        
                        @else
                        <td>{{$vendor->shop->shop_name}}</td>
                            
                        @endif
                        
                        @else
                        @if (app()->getLocale() == 'en')
                            
                        <td>N/A</td>
                        @else
                        <td>لا يوجد متجر</td>
                            
                        @endif
                            
                        @endif
                        <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($vendor->created_at))->format('d-m-Y')}}</td>
                        <td>@money($vendor->wallet ? $vendor->wallet->balance : '0', 'OMR')</td>
                        <td>
                            <div>
                                <a href="{{route('admin.vendors.suspend', $vendor->id)}}" class="{{ $vendor->suspended == 1 ? 'text-success' : 'text-success' }}">
                                    <i class="{{ $vendor->suspended == 1 ? 'fa fa-check fa-2x' : 'fa fa-toggle-on fa-2x' }}"
                                        @if (app()->getLocale() == 'en')
                                            
                                        title="{{ $vendor->suspended == 1 ? 'start' : 'stop' }}">
                                        @else
                                        title="{{ $vendor->suspended == 1 ? 'فك الحجب' : 'حجب' }}">
                                            
                                        @endif 
                                    </i>
                                </a>
                            </div>
                        </td>
                    </tr>
                        
                    @endforeach 
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection