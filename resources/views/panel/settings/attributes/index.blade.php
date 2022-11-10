@extends('layouts.app2')
@section('title', 'Attributes')
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

                    <a href="{{route('admin.attribute.create')}}" class="btn btn-primary add-row mt-md-0 mt-2">Add
                        New Attribute</a>
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
                                @foreach ($attributes as $attribute)
                                <tr>

                                    <td data-field="name">{{$attribute->name}}</td>

                                    <td data-field="name">{{$attribute->name}}</td>

                                    <td>
                                        <a href="{{route('admin.attribute.show', $attribute->id)}}">
                                            <i class="fa fa-eye" title="show"></i>
                                        </a>

                                        <form action="{{route('admin.attribute.destroy', $attribute->id)}}" method="POST">
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