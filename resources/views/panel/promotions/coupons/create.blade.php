@extends('layouts.app2')
@section('title', __('adminBody.new_coupon'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">{{__('adminBody.new_coupon')}}</a></li>
                    </ul>
                    @if ($errors->count() > 0)
                    {{$errors}}
                        
                    @endif
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="POST" action="{{route('admin.coupons.store')}}" class="needs-validation user-add">
                                @csrf
                                <h4>{{__('adminBody.new_coupon')}}</h4>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('adminBody.Code')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="code" name="code" type="text"
                                            required="">
                                    </div>
                                    @if($errors->has('code'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('code') }}
                                    </div>
                                @endif
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span> {{__('adminBody.Discount')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="discount" name="discount" type="number"
                                        step="0.01"
                                            required="">
                                    </div>
                                     @if($errors->has('discount'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('discount') }}
                                    </div>
                                @endif
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('adminBody.Expire_Date')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="expire_at" name="expire_at" type="date"
                                            required="">
                                    </div>
                                     @if($errors->has('expire_at'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('expire_at') }}
                                    </div>
                                @endif
                                </div>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary" value="{{__('adminBody.save')}}"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection