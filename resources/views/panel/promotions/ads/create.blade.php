@extends('layouts.app2')
@section('title', __('adminBody.new_ad'))
@section('content')
<div class="container-fluid">
    <div class="card tab2-card">
        <div class="card-body">
            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active show" id="general-tab"
                        data-bs-toggle="tab" href="#general" role="tab" aria-controls="general"
                        aria-selected="true" data-original-title="" title="">{{__('adminBody.new_ad')}}</a></li>
            </ul>
            @if ($errors->count() > 0)
                {{$errors}}
            @endif
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="general" role="tabpanel"
                    aria-labelledby="general-tab">
                    <form method="POST" action="{{route('admin.ads.store')}}" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        <h4>{{__('adminBody.new_ad')}}</h4>
                        <div class="form-group row">
                            <label class="col-xl-3 col-md-4"><span>*</span>{{__('body.product')}}</label>
                            <div class="col-md-7">
                                <select class="js-example-basic-multiple form-control" name="product_id" >
                                    @foreach($products as $id => $entry)
                                    <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>
                                {{__('body.image')}}</label>
                            <div class="col-xl-8 col-md-7">
                                <input class="form-control" type="file" id="image" name="image">
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
@endsection