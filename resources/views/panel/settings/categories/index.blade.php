@extends('layouts.app2')
@section('title', 'Categories')
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

                    <a href="{{route('admin.categories.create')}}" class="btn btn-primary add-row mt-md-0 mt-2">Add
                        Category</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Commission</th>
                                    <th>color</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($categories as $category) 
                                    
                                <tr>
                                    <td>
                                        <img src="{{asset($category->image)}}"
                                            data-field="image" alt="">
                                    </td>

                                    <td data-field="name">{{$category->en_name}}</td>

                                    <td data-field="price">{{$category->commission}}</td>

                                    <td>
                                        <span style="background: {{$category->color}}; color: white">Category Color</span>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.categories.edit', $category->id)}}">
                                            <i class="fa fa-edit" title="Edit"></i>
                                        </a>

                                        <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
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
                <div class="d-flex justify-content-center">
                    {!! $categories->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection