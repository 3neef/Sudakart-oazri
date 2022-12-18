@extends('layouts.app2')
@section('title', __('adminBody.update_reason'))
@section('content')
<div class="container-fluid">
    <div class="card tab2-card">
        <div class="card-body">
            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active show" id="restriction-tabs" data-bs-toggle="tab"
                        href="#restriction" role="tab" aria-controls="restriction" aria-selected="false"
                        data-original-title="" title="">{{__('adminBody.update_card')}}</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="restriction" role="tabpanel"
                    aria-labelledby="restriction-tabs">
                    <form method="POST" action="{{ route('admin.card.update', $card->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="validationCustom4" class="col-xl-3 col-md-4">{{__('adminBody.Amount')}}</label>
                            <div class="col-md-7">
                                <input class="form-control" value="{{$card->amount}}" name="amount" id="amount" type="number" step="100">
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