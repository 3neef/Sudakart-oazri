@extends('layouts.app2')
@section('title', __('adminNav.reasons'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">

                    <a href="{{route('admin.reason.create')}}" class="btn btn-primary add-row mt-md-0 mt-2">{{__('adminBody.new_reason')}}</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th>{{__('body.name')}}</th>
                                    <th>{{__('form.en_name')}}</th>
                                    <th>{{__('adminBody.Actions')}}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($reasons as $reason)
                                <tr>
                                    <td data-field="name">{{$reason->name}}</td>

                                    <td data-field="name">{{$reason->en_name}}</td>

                                    <td>
                                        <a href="{{route('admin.reason.edit', $reason->id)}}">
                                            <i class="fa fa-edit" title="{{__('body.edit')}}"></i>
                                        </a>

                                        <form action="{{route('admin.reason.destroy', $reason->id)}}" method="POST">
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
            </div>
        </div>
    </div>
</div>
@endsection