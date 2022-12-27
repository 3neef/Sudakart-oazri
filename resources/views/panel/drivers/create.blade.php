@extends('layouts.app2')
@section('title', __('body.create_account'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">{{__('body.create_account')}}</a></li>
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
                            <form class="needs-validation user-add" action="{{route('admin.driver-create.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h4>{{__('body.Details')}}</h4>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('body.name')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="name" type="text"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('form.phone_number')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="phone" type="number"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('body.email')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="email" type="email"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('form.second_email')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="secondary_email" type="email"
                                            >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('body.Second_Phone')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="secondary_phone" type="number"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('body.address')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="address" type="text"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom02" class="col-xl-3 col-md-4"><span></span>
                                        {{__('Image')}}</label>
                                        <div class="col-xl-8 col-md-7">
                                        <input class="form-control" type="file" id="formFileMultiple" name="image"/>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom02" class="col-xl-3 col-md-4"><span></span>
                                        {{__('Identity')}}</label>
                                        <div class="col-xl-8 col-md-7">
                                        <input class="form-control" type="file" id="formFileMultiple" name="identity"/>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('vichel')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <select class="custom-select form-control {{ $errors->has('vichel') ? 'is-invalid' : '' }}" name="vichel" id="vichel" required>
                                            <option value="">choose</option>
                                            @foreach($vichels as  $vichel)
                                                <option value="{{ $vichel }}">{{ $vichel }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom3"
                                        class="col-xl-3 col-md-4"><span>*</span> {{__('body.password')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="password"
                                            type="password" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom4"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('body.Confirm_Password')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="password_confirmation"
                                            type="password" required="">
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