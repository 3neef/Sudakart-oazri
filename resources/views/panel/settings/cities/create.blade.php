@extends('layouts.app2')
@section('content')
@section('title', __('adminBody.new_city'))
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">{{__('adminBody.new_city')}}</a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="POST" action="{{route('admin.cities.store')}}" class="needs-validation user-add">
                                @csrf
                                <h4>{{__('adminBody.new_city')}}</h4>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span>{{__('adminBody.State')}}</label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="state_id" style="width: 100%" id="StateId" required>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('adminBody.Name')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="name" name="name" type="text"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('form.en_name')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="en_name" name="en_name" type="text"
                                            required="">
                                    </div>
                                </div>
                                <h4 class="mt-5">{{__('body.delivary_prices')}}</h4>
                                @foreach ($methods as $method)
                                    
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                    class="col-xl-3 col-md-4"><span>*</span>{{__('body.delivary_price')}} {{app()->getLocale() == 'en' ? $method->en_name : $method->name }}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="methods[{{$method->id}}]" type="number" step=".1"
                                        required="">
                                    </div>
                                </div>
                                @endforeach
                                <div class="pull-right mt-3">
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

            $('#StateId').select2({
            dir:lang, 
            ajax : {
                url: "{{ route('admin.markets.getStates') }}",
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