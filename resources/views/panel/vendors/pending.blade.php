@extends('layouts.app2')
@section('title', __('adminBody.Pending_Vendors_List'))
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body vendor-table">
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
                        <td>{{$vendor->shop->shop_en_name}}</td>
                        
                        @else
                        <td>N/A</td>
                            
                        @endif
                        <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($vendor->created_at))->format('d-m-Y')}}</td>
                        <td>@if($vendor->wallet){{$vendor->wallet->balance}}@endif</td>
                        <td>
                            <div>
                                <a href="{{route('admin.vendors.suspend', $vendor->id)}}">
                                    <i class="fa fa-stop fa-2x" title="suspend"></i>
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