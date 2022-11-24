@extends('layouts.app2')
@section('title', __('adminBody.update_reason'))
@section('content')
<div class="container-fluid">
    <div class="card tab2-card">
        <div class="card-body">
            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active show" id="restriction-tabs" data-bs-toggle="tab"
                        href="#restriction" role="tab" aria-controls="restriction" aria-selected="false"
                        data-original-title="" title="">{{__('adminBody.update_reason')}}</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="restriction" role="tabpanel"
                    aria-labelledby="restriction-tabs">
                    <form method="POST" action="{{ route('admin.reason.update', $reason->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="validationCustom4" class="col-xl-3 col-md-4">{{__('body.name')}}</label>
                            <div class="col-md-7">
                                <input class="form-control" value="{{$reason->name}}" name="name" id="name" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="validationCustom4" class="col-xl-3 col-md-4">{{__('form.en_name')}}</label>
                            <div class="col-md-7">
                                <input class="form-control" value="{{$reason->en_name}}" name="en_name" id="en_name" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="submit" class="btn btn-primary" value="{{__('adminBody.save')}}"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection