@extends('layouts.app2')
@section('title', __('adminNav.regions'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">

                    <a href="{{route('admin.cities.create')}}" class="btn btn-primary add-row mt-md-0 mt-2">{{__('adminBody.new_city')}}</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th>{{__('adminDash.id')}}</th>
                                    <th>{{__('body.name')}}</th>
                                    <th>{{__('form.en_name')}}</th>
                                    <th>{{__('adminBody.State')}}</th>
                                    <th>{{__('adminBody.Actions')}}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($cities as $city)
                                <tr>
                                    

                                    <td data-field="name">{{$loop->index + 1}}</td>

                                    <td data-field="name">{{$city->name}}</td>

                                    <td data-field="name">{{$city->en_name}}</td>

                                    <td data-field="price">{{$city->state->name}}</td>

                                

                                    <td>
                                        <a href="{{route('admin.cities.edit', $city->id)}}">
                                            <i class="fa fa-edit" title="{{__('body.edit')}}"></i>
                                        </a>

                                        <form action="{{route('admin.region.destroy', $city->id)}}" method="POST">
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
                    {!! $cities->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection