@extends('layouts.app2')
@section('title', __('adminNav.regions'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">

                    <a href="{{route('admin.region.create')}}" class="btn btn-primary add-row mt-md-0 mt-2">{{__('adminBody.new_region')}}</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th>{{__('adminDash.id')}}</th>
                                    <th>{{__('body.region')}}</th>
                                    <th>{{__('body.delivary_price')}}</th>
                                    <th>{{__('adminBody.Actions')}}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($regions as $region)
                                <tr>
                                    

                                    <td data-field="name">{{$region->region_id}}</td>

                                    <td data-field="name">{{$region->region}}</td>

                                    <td data-field="price">@money($region->region_delivery_fee,'OMR')</td>

                                

                                    <td>
                                        <a href="{{route('admin.region.edit', $region->id)}}">
                                            <i class="fa fa-edit" title="{{__('body.edit')}}"></i>
                                        </a>

                                        <form action="{{route('admin.region.destroy', $region->id)}}" method="POST">
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
                    {!! $regions->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection