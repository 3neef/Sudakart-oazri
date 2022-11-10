@extends('layouts.app2')
@section('content')
@section('title', 'create a new Attribute')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">New</a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="POST" action="{{route('admin.attribute.update')}}" class="needs-validation user-add" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <h4>Account</h4>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span>Name</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="name" name="name" type="text"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span> English Name</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="en_name" name="en_name" type="text"
                                            required="">
                                    </div>
                                </div>
                                <div id="dynamicAddRemove" class="addandremove">
                                    <div class="form-group row">
                                        <label for="validationCustom2"
                                            class="col-xl-3 col-md-4"><span>*</span>Option</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="options[0][option]" name="options[0][option]" type="text"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom3"
                                            class="col-xl-3 col-md-4"><span>*</span>English option</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="options[0][en_option]" name="options[0][en_option]"
                                                type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary"></input>
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

//
