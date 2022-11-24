@extends('layouts.app2')
@section('title', __('adminNav.categories'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('admin.categories.create')}}" class="btn btn-primary add-row mt-md-0 mt-2">{{__('adminBody.NEW_Category')}}</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th>{{__('adminBody.Image')}}</th>
                                    <th>{{__('body.name')}}</th>
                                    <th>{{__('form.en_name')}}</th>
                                    <th>{{__('body.commission')}}</th>
                                    <th>{{__('body.color')}}</th>
                                    <th>{{__('adminBody.Actions')}}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($categories as $category) 
                                    
                                <tr>
                                    <td>
                                        <img src="{{asset($category->image)}}"
                                            data-field="image" alt="">
                                    </td>

                                    <td data-field="name">{{$category->name}}</td>

                                    <td data-field="name">{{$category->en_name}}</td>

                                    <td data-field="price">{{$category->commission}}</td>

                                    <td>
                                        <span style="background: {{$category->color}}; color: white">{{__('body.color')}}</span>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.categories.edit', $category->id)}}">
                                            <i class="fa fa-edit" title="{{__('body.edit')}}"></i>
                                        </a>

                                        <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash" title="{{__('body.delete')}}"></i></button>
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