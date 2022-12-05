@extends('layouts.app2')
@section('content')
@section('title', __('adminBody.new_market'))
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">{{ __('adminBody.new_market')}}</a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="POST" action="{{route('admin.markets.store')}}" class="needs-validation user-add" enctype="multipart/form-data">
                                @csrf
                                <h4>{{ __('adminBody.new_market')}}</h4>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span>{{__('adminBody.city')}}</label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="city_id" style="width: 100%" id="cityId" required>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('body.name')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="name" name="name" type="text"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span> {{__('form.en_name')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="en_name" name="en_name" type="text"
                                            required="">
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary" value="{{__('adminBody.save')}}"></input>
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


@push('scripts')
    <script>
        $(document).ready(function() {
            
            var dir = "{{app()->getLocale()}}";
            var lang = "";

            if(dir == 'en')
            {
                lang = 'ltr';
            }else{
                lang = 'rtl';
            }

            $('#cityId').select2({
            dir:lang, 
            ajax : {
                url: "{{ route('admin.markets.getcities') }}",
                type : "get" ,
                dataType : "json",
                data : function (params) {
                    return {
                        search : params.term
                    };
                } ,
                processResults: function (response) {
                    return{
                    results : response
                    };
                },
                cache: true
                }
            });
    });
    </script>

@endpush