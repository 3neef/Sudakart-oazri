@extends('layouts.app2')
@section('content')
@section('title', __('adminBody.offers_list'))
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    @can('create-offer')
                        <a href="{{route('admin.offers.create')}}" class="btn btn-primary mt-md-0 mt-2">{{__('adminBody.New_Offer')}}</a>
                    @endcan
                </div>

                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi">
                            <table class="all-package coupon-table table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{__('body.name')}}</th>
                                        <th>{{__('form.en_name')}}</th>
                                        <th>{{__('adminBody.Discount')}}</th>
                                        <th>{{__('adminBody.Created_On')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offers as $offer)
                                    <tr data-row-id="{{$offer->id}}">
                                        <td>{{$offer->name}}</td>

                                        <td>{{$offer->en_name}}</td>

                                        <td>{{$offer->discount}}</td>

                                        <td>
                                            {{ \Carbon\Carbon::createFromTimestamp(strtotime($offer->expire_at))->format('d-m-Y')}}
                                        </td>
                                        @can('delete-offer')
                                        <td>
                                            <form action="{{route('admin.offers.destroy', $offer->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash" title="{{__('body.delete')}}"></i></button>
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