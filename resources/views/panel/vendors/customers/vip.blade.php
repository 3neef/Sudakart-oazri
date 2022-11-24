@extends('layouts.app2')
@section('title', __('adminNav.vip_customer'))
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body vendor-table">
            <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th>{{__('adminBody.customer_name')}}</th>
                        <th>{{__('body.Orders')}}</th>
                        <th>{{__('adminBody.Create_Date')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_customers as $customer)
                    <tr>
                        <td>
                        {{$customer->name}}
                        </td>
                        <td>{{$customer->orders->count()}}</td>
                        <td>{{\Carbon\Carbon::createFromTimestamp(strtotime($customer->created_at))->format('d-m-Y')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection