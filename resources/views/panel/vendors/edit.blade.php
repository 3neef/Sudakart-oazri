@extends('layouts.app2')
@section('title', __('body.update_vendor'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">{{__('body.update_vendor')}}</a></li>
                    </ul>
                    @if($errors->any())
                        <section class="col-lg-12">
                        
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger d-flex justify-content-between align-items-center">
                                    {{$error}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endforeach
                        
                        </section>
                    @endif
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form class="needs-validation user-add" action="{{route('admin.vendors.update', $vendor->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <h4>{{__('body.Details')}}</h4>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('form.f_name')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="first_name" type="text" value="{{$vendor->first_name}}"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('form.l_name')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="last_name" type="text" value="{{$vendor->last_name}}"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('form.phone_number')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="phone" type="number" value="{{$vendor->user->phone}}"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('body.email')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="email" type="email" value="{{$vendor->user->email}}"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('body.Second_Phone')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="secondary_phone" type="number" value="{{$vendor->secondary_phone}}"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('form.bank_name')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="bank_name" type="text" value="{{$vendor->bank_name}}"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('form.account_number')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="account_number" type="text" value="{{$vendor->account_number}}"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('form.account_name')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="account_holder_name" type="text" value="{{$vendor->account_holder_name}}"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('form.branch')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="branch" type="text" value="{{$vendor->branch}}"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('form.shop_name')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="shop_name" type="text" value="{{$vendor->shop->shop_name}}"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('form.shop_en_name')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="shop_en_name" type="text" value="{{$vendor->shop->shop_en_name}}"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('form.shop_address')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="shop_address" type="text" value="{{$vendor->shop->shop_Address}}"
                                            required="">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('form.shop_categories')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <select class="js-example-basic-multiple form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" name="shop_categories[][category_id]" multiple="multiple">
                                            @foreach($categories as $id => $entry)
                                                <option data-badge="" value="{{ $id }}" {{ old('shop_categories[]') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">{{__('adminBody.save')}}</button>
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