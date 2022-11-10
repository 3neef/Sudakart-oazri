@extends('layouts.app2')
@section('content')
@section('title', __('adminNav.upselling'))
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
                    @can('create-upselling')
                    <a href="{{route('admin.upselling.create')}}" class="btn btn-primary mt-md-0 mt-2">{{ __('adminBody.New_upselling') }}</a>
                    @endcan
                </div>

                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi">
                            <table class="all-package coupon-table table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('adminBody.UP_Title') }}</th>
                                    
                                        <th>{{ __('adminBody.Products_Count') }}</th>
                                        <th>{{ __('adminBody.Create_Date') }}</th>
                                        <th>{{ __('adminBody.Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($upsells as $upsell)
                                    <tr data-row-id="1">
                                        <td>{{$upsell->discount *100 }}% Off</td>

                                    

                                        <td>{{$upsell->products->count()}}</td>

                                        <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($upsell->created_at))->format('d-m-Y')}}</td>
                                        @can('delete-upselling')
                                        <td>
                                            <form action="{{route('admin.offers.destroy', $upsell->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                        @endcan
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
</div>
@endsection