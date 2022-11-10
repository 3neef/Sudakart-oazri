@extends('layouts.app2')
@section('title', 'Users List')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">

            <a href="{{route('admin.admin-create')}}" class="btn btn-primary mt-md-0 mt-2">Create a user</a>
        </div>
        <div class="card-body vendor-table">
            <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>secondary phone</th>
                        <th>secondary email</th>
                        <th>address</th>
                        <th>created at</th>
                        <th>Action</th>
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
                        <td>
                            <div>
                                <i class="fa fa-edit me-2 font-success"></i>
                                <i class="fa fa-trash font-danger"></i>
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