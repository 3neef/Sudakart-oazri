@extends('layouts.app2')
@section('title', __('adminNav.Logs'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('Log Model')}}</th>
                                    <th>{{__('Made By')}}</th>
                                    <th>{{__('User Type')}}</th>
                                    <th>{{__('Log Description')}}</th>
                                    <th>{{__('Made at')}}</th>
                                    <th>{{__('Show Changes')}}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($activities as $activity)
                                <tr>
                                    

                                    <td data-field="name">{{$activity->id}}</td>

                                    <td data-field="name">{{$activity->log_name}}</td>

                                    <td data-field="name">{{$activity->causer ? $activity->causer->userable->name : $activity->causer->userable->first_name }}</td>

                                    <td data-field="price">{{$activity->causer ? $activity->causer->userable_type : ''}}</td>

                                    <td data-field="price">{{$activity->description}}</td>

                                    <td data-field="price">{{$activity->created_at}}</td>

                                

                                    <td>
                                        <a href="{{route('admin.activities.show', $activity->id)}}">
                                            <i class="fa fa-eye fa-2x text-primary" title="{{__('body.show')}}"></i>
                                        </a>
                                    </td>
                                </tr>
                                    
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {!! $activities->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection