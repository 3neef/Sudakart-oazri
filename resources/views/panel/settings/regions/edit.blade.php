@extends('layouts.app2')
@section('content')
@section('title', 'Update A Region')
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
                            <form method="POST" action="{{route('admin.region.update', $region->id)}}" class="needs-validation user-add">
                                @csrf
                                @method('PUT')
                                <h4>Account</h4>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span>Region Name</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="region" name="region" type="text" value="{{$region->region}}"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span>Price</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="region_delivery_fee" name="region_delivery_fee" type="number" value="{{$region->region_delivery_fee}}"
                                            required="">
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