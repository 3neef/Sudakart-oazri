@extends('layouts.app2')
@section('title', __('adminBody.dep_wit'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="bg-inner cart-section order-details-table">
                        <div class="row g-12">
                            <div class="col-max">
                                <div class="card-details-title">
                                    <h3>{{__('body.wallet_balance')}}<span> @money($wallet->balance, 'OMR')</span></h3>
                                </div>
                                <div class="card tab2-card">
                        <div class="card-body">
                            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                                <li class="nav-item"><a class="nav-link active show" id="general-tab"
                                        data-bs-toggle="tab" href="#general" role="tab" aria-controls="general"
                                        aria-selected="true" data-original-title="" title="">{{__('body.withdraw')}}</a></li>
                                <li class="nav-item"><a class="nav-link" id="usage-tab" data-bs-toggle="tab"
                                        href="#usage" role="tab" aria-controls="usage" aria-selected="false"
                                        data-original-title="" title="">{{__('body.deposit')}}</a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="general" role="tabpanel"
                                    aria-labelledby="general-tab">
                                    <form method="POST" action="{{ route('withdraw') }}">
                                        @csrf
                                        <h4>{{__('form.make_withdraw')}}</h4>
                                        <div class="form-group row">
                                                <input class="form-control" id="user_id" name="user_id" value="{{$wallet->accountable->user->id}}" type="number" hidden>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom6" class="col-xl-3 col-md-4">{{__('adminBody.Amount')}}</label>
                                            <div class="col-md-7">
                                                <input class="form-control" id="amount" name="amount" type="number">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom7" class="col-xl-3 col-md-4">{{__('adminBody.Notes')}}</label>
                                            <div class="col-md-7">
                                                <input class="form-control" id="notes" name="notes" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <input class="btn btn-primary" type="submit" value="{{__('adminBody.save')}}"></input>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="usage" role="tabpanel" aria-labelledby="usage-tab">
                                    <form method="POST" action="{{ route('deposit') }}">
                                        @csrf
                                        <h4>{{__('form.make_deposit')}}</h4>
                                        <div class="form-group row">
                                                <input class="form-control" id="user_id" name="user_id" value="{{$wallet->accountable->user->id}}" type="number" hidden>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom6" class="col-xl-3 col-md-4">{{__('adminBody.Amount')}}</label>
                                            <div class="col-md-7">
                                                <input class="form-control" id="amount" name="amount" type="number">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom7" class="col-xl-3 col-md-4">{{__('adminBody.Notes')}}</label>
                                            <div class="col-md-7">
                                                <input class="form-control" id="notes" name="notes" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <input class="btn btn-primary" type="submit" value="{{__('adminBody.save')}}"></input>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                            </div>


                        </div>
                    </div>
                    <!-- section end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection