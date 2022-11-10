@extends('layouts.app2')
@section('title', 'Reasons')
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

                    <a href="{{route('admin.reason.create')}}" class="btn btn-primary add-row mt-md-0 mt-2">Add
                        a Reason</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>English Name</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($reasons as $reason)
                                <tr>
                                    <td data-field="name">{{$reason->name}}</td>

                                    <td data-field="name">{{$reason->en_name}}</td>

                                    <td>
                                        <a href="{{route('admin.reason.edit', $reason->id)}}">
                                            <i class="fa fa-edit" title="Edit"></i>
                                        </a>

                                        <form action="{{route('admin.reason.destroy', $reason->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection