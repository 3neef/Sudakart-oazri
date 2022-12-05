@extends('layouts.app2')
@section('title', __('adminNav.markets'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('admin.markets.create')}}" class="btn btn-primary add-row mt-md-0 mt-2">{{__('adminBody.new_market')}}</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th>{{__('adminBody.city')}}</th>
                                    <th>{{__('body.name')}}</th>
                                    <th>{{__('form.en_name')}}</th>
                                    <th>{{__('adminBody.Actions')}}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($markets as $market) 
                                    
                                <tr>
                                    <td>
                                        @if (app()->getLocale() == 'en')
                                        {{$market->city->en_name}} - {{$market->city->state->en_name}}
                                        
                                        @else
                                        {{$market->city->name}} - {{$market->city->state->name}}
                                            
                                        @endif
                                    </td>

                                    <td data-field="name">{{$market->name}}</td>

                                    <td data-field="name">{{$market->en_name}}</td>

                                    <td>
                                        <a href="{{route('admin.markets.edit', $market->id)}}">
                                            <i class="fa fa-edit" title="{{__('body.edit')}}"></i>
                                        </a>

                                        <form action="{{route('admin.markets.destroy', $market->id)}}" method="POST">
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
                    {!! $markets->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection