@extends('layouts.app2')
@section('title', __('adminNav.users'))
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">

            <a href="{{route('admin.admin-create')}}" class="btn btn-primary mt-md-0 mt-2">{{__('body.create_account')}}</a>
        </div>
        <div class="card-body vendor-table">
            <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th>{{__('adminDash.id')}}</th>
                        <th>{{__('body.name')}}</th>
                        <th>{{__('body.Second_Phone')}}</th>
                        <th>{{__('body.email')}}</th>
                        <th>{{__('body.address')}}</th>
                        <th>{{__('adminBody.join')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                        <td>{{$admin->id}}</td>
                        <td>{{$admin->name}}</td>
                        <td>{{$admin->secondary_phone}}</td>
                        <td>{{$admin->secondary_email}}</td>
                        <td>{{$admin->address}}</td>
                        <td>{{$admin->created_at}}</td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection