@extends('layouts.app2')
@section('title', __('adminBody.VENDORS_LIST'))
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class=" table-responsive table-desi">
            <table class="table list-digital all-package table-category "
                id="editableTable">
                <thead>
                    <tr>
                        <th>{{ __('adminBody.no') }}</th>
                        <th>{{ __('adminBody.Vendor') }}</th>
                        <th>{{ __('adminBody.products') }}</th>
                        <th>{{ __('adminBody.Store_Name') }}</th>
                        <th>{{ __('adminBody.join') }}</th>
                        <th>{{ __('adminBody.sold') }}</th>
                        <th>{{ __('adminBody.Wallet_Balance') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vendors as $vendor)
                    <tr>
                        <td>{{$loop->index+1}}</td>
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
                        <td>{{$vendor->orders_count}}</td>
                        <td>{{$vendor->wallet->balance}}</td>
                    </tr>
                        
                    @endforeach 
                    
                </tbody>
            </table>
        </div>
    </div>
    {{-- <div class="d-flex justify-content-center">
        {!! $vendors->links() !!}
    </div> --}}
</div>
@endsection