@extends('layouts.app2')
@section('title', __('adminBody.Notifications'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                   

                    <a href="{{route('admin.readAll')}}" class="btn btn-primary mt-md-0 mt-2">{{ __('adminBody.Read_all') }}</a>
                    <a href="{{route('admin.push.specified.create')}}" class="btn btn-primary mt-md-0 mt-2">{{ __('adminBody.send') }}</a>
                    <a href="{{route('admin.pushnotifications.create')}}" class="btn btn-primary mt-md-0 mt-2">{{ __('adminBody.bulk') }}</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="all-package coupon-table table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('adminBody.no') }}</th>
                                    <th>{{ __('adminBody.Name') }}</th>
                                    <th>{{ __('adminBody.Status') }}</th>
                                    <th>{{ __('adminBody.Created_On') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($notifications as $noti)
                                <tr data-row-id="1">
                                    <td>
                                        {{$noti->id}}
                                    </td>
                                    
                                    <td>{{$noti->title}}</td>
                                    
                                    <td>
                                        {{$noti->message}}
                                    </td>
                                    
                                    <td class="list-date">{{\Carbon\Carbon::createFromTimestamp(strtotime($noti->created_at))->format('d-m-Y')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $notifications->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection