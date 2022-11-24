@extends('layouts.app2')
@section('content')
@section('title', __('adminBody.Coupons_List'))
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

                    @if(auth()->user()->userable_type == 'App\Models\Vendor')
                    <a href="{{route('admin.coupons.create')}}" class="btn btn-primary mt-md-0 mt-2">
                        {{ __('adminBody.new_coupon') }}
                    </a>
                    @endif
                </div>

                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi">
                            <table class="all-package coupon-table table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('adminBody.shop_name') }}</th>
                                        <th>{{ __('adminBody.Code') }}</th>
                                        <th>{{ __('adminBody.Discount') }}</th>
                                        <th>{{ __('adminBody.Expire_Date') }}</th>
                                        <th>{{ __('adminBody.stoped') }}</th>
                                        @if (auth()->user()->userable_type == 'App\Models\Vendor')
                                            
                                        <th>{{ __('adminBody.Actions') }}</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $coupon)
                                    <tr data-row-id="1">
                                        @if (app()->getLocale() == 'en')
                                        <td data-field="name">{{$coupon->shop ? $coupon->shop->shop_en_name : 'oazri'}}</td>
                                        
                                        @else
                                        <td data-field="name">{{$coupon->shop ? $coupon->shop->shop_name : 'العزري'}}</td>
                                            
                                        @endif

                                        <td>{{$coupon->code}}</td>

                                        <td>{{$coupon->discount}}</td>

                                        <td>
                                            {{ \Carbon\Carbon::createFromTimestamp(strtotime($coupon->expire_at))->format('d-m-Y')}}
                                        </td>
                                        @if ($coupon->stop == true)
                                        <td class="td-check">
                                            <i data-feather="check-circle"></i>
                                        </td>
                                            
                                        @else
                                            
                                        <td class="td-cross">
                                            <i data-feather="x-circle"></i>
                                        </td>
                                        @endif
                                        @if (auth()->user()->userable_type == 'App\Models\Vendor')
                                        <td>
                                            @can('stop-coupon')
                                            
                                            <form action="{{route('admin.coupons.update', $coupon->id)}}" method="POST">
                                                @csrf
                                                @method('Put')
                                                <input type="number" value="1" name="stop" hidden>
                                                <button type="submit" style="border:none"><i class="fa fa-stop" title="{{__('body.stop')}}"></i></button>
                                            </form>
                                            @endcan
                                            @can('delete-coupon')
                                            <form action="{{route('admin.coupons.destroy', $coupon->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash" title="{{__('body.delete')}}"></i></button>
                                            </form>
                                            
                                            @endcan
                                        </td>
                                        @endif
                                    </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $coupons->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection