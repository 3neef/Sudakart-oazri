@extends('layouts.app2')
@section('title', __('adminBody.Advertisements_list'))
@section('content')
<div class="container-fluid bulk-cate">

    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.ads.create')}}" class="btn btn-primary mt-md-0 mt-2">{{ __('adminBody.new_ad') }}</a>
        </div>

        <div class="card-body">
            <div class="table-responsive table-desi">
                <table class="all-package coupon-table table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('adminBody.Image') }}</th>
                            <th>{{ __('adminBody.Product_Name') }}</th>
                            <th>{{ __('adminBody.Actions') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($ads as $ad)
                            
                        <tr data-row-id="1">
                            <td>
                                <img src="{{asset($ad->image)}}" alt="user">
                            </td>
                            
                            <td>@if($ad->product){{$ad->product->en_name}}@endif</td>
                            
                            <td>
                                <form action="{{route('admin.ads.destroy', $ad->id)}}" method="POST">
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
            {{ $ads->links() }}
        </div>
    </div>
</div>
@endsection