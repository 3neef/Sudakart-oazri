@extends('layouts.app2')
@section('title', 'VIP  Customers List')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body vendor-table">
            <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Order</th>
                        <th>Create Date</th>
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