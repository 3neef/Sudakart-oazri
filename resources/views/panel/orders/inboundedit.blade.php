@extends('layouts.app2')
@section('content')
@section('title', 'Request a new Category')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                    @if($errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">New</a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="POST" action="{{route('admin.orders.inbound.status', $order->id)}}" class="needs-validation user-add" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <h4>Assigne driver or update status</h4>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span>Drivers</label>
                                    <div class="col-xl-8 col-md-7">
                                        <select class="custom-select form-control {{ $errors->has('driver') ? 'is-invalid' : '' }}" name="driver_id" id="driver_id">
                                            @foreach($drivers as $id => $entry)
                                                <option value="{{ $id }}" {{ old('driver_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span>Status</label>
                                    <div class="col-xl-8 col-md-7">
                                        <select class="custom-select form-control" name="status" id="status">
                                            <option value="">--Select Status--</option>
                                            @foreach($statuses as $status)
                                                <option value="{{ $status }}">{{ $status }}</option>
                                            @endforeach
                                        </select>
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