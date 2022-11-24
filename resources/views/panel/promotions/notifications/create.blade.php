@extends('layouts.app2')
@section('title', __('adminBody.sent_noti'))
@section('content')
<div class="container-fluid">
    <div class="card tab2-card">
        <div class="card-body">
            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active show" id="general-tab"
                        data-bs-toggle="tab" href="#general" role="tab" aria-controls="general"
                        aria-selected="true" data-original-title="" title="">{{__('adminBody.sent_noti')}}</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="general" role="tabpanel"
                    aria-labelledby="general-tab">
                    <form method="POST" action="{{route('admin.push.vendors.store')}}" class="needs-validation">
                        @csrf
                        <h4>{{__('adminBody.sent_noti')}}</h4>
                        <div class="form-group row">
                            <label class="col-xl-3 col-md-4"><span>*</span>{{__('adminBody.Account_Type')}}</label>
                            <div class="col-md-7">
                                <select class="custom-select w-100 form-control" name="userable_type" required="">
                                    <option value="">{{__('body.Choose')}}</option>
                                    <option value="App\Models\Vendor">{{__('adminBody.Vendors')}}</option>
                                    <option value="App\Models\Customer">{{__('adminNav.customers')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>
                                {{__('adminBody.Subject')}}</label>
                            <div class="col-xl-8 col-md-7">
                                <input class="form-control" id="validationCustom0" name="title" type="text">
                            </div>
                        </div>
                        <div class="form-group row editor-label">
                            <label class="col-xl-3 col-md-4"><span>*</span> {{__('form.write_message')}}</label>
                            <div class="col-xl-8 col-md-7">
                                <div class="editor-space">
                                    <textarea class="editor1" name="body" rows="10"></textarea>
                                </div>
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