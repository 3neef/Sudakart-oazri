@extends('layouts.app2')
@section('title', 'Delivery Methods')
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

                    <a href="{{route('admin.region.create')}}" class="btn btn-primary add-row mt-md-0 mt-2">Add
                        A new Region</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th>Region ID</th>
                                    <th>Region</th>
                                    <th>Price</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($regions as $region)
                                <tr>
                                    

                                    <td data-field="name">{{$region->region_id}}</td>

                                    <td data-field="name">{{$region->region}}</td>

                                    <td data-field="price">{{$region->region_delivery_fee}} OMR</td>

                                

                                    <td>
                                        <a href="{{route('admin.region.edit', $region->id)}}">
                                            <i class="fa fa-edit" title="Edit"></i>
                                        </a>

                                        <form action="{{route('admin.region.destroy', $region->id)}}" method="POST">
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
                    {!! $regions->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection