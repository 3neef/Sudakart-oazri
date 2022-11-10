@extends('layouts.app2')
@section('title', 'Roles')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-inline search-form search-box">
                        <div class="form-group">
                            <input class="form-control-plaintext" type="search" placeholder="Search..">
                        </div>
                    </form>
        
                    <a href="{{route('admin.roles.create')}}" class="btn btn-primary add-row mt-md-0 mt-2">Add
                        a Role</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($roles as $item)
                                <tr>
                                    <td data-field="name">{{ $item->id }}</td>

                                    <td data-field="price">{{ $item->name }}</td>

                                    <td>
                                        <a href="{{ route('admin.roles.edit', $item->id) }}">
                                            <i class="fa fa-edit" title="Edit"></i>
                                        </a>

                                        <a href="{{ route('admin.roles.delete', $item->id) }}" onclick="return confirm('Are you sure you want to delete this role')">
                                            <i class="fa fa-trash" title="Delete"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection