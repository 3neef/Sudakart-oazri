@extends('layouts.app2')
@section('title', __('adminBody.MAKE_COMPLAINT'))
@section('content')
<div class="container-fluid">
    <div class="card tab2-card">
        <div class="card-body">
            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active show" id="general-tab"
                        data-bs-toggle="tab" href="#general" role="tab" aria-controls="general"
                        aria-selected="true" data-original-title="" title="">{{ __('adminBody.New') }}</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="general" role="tabpanel"
                    aria-labelledby="general-tab">
                    <form method="POST" action="{{route('admin.complaints.store')}}" class="needs-validation">
                        @csrf
                       
                        <div class="form-group row">
                            <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>
                                {{ __('adminBody.Subject') }}</label>
                            <div class="col-xl-8 col-md-7">
                                <input class="form-control" id="validationCustom0" name="subject" type="text">
                            </div>
                        </div>
                        <div class="form-group row editor-label">
                            <label class="col-xl-3 col-md-4"><span>*</span> {{ __('adminBody.Description') }}</label>
                            <div class="col-xl-8 col-md-7">
                                <div class="editor-space">
                                    <textarea id="editor1" name="body" cols="30"
                                        rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">{{ __('adminBody.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection