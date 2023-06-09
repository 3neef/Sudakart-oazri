@extends('layouts.app2')
@section('content')
@section('title', __('adminBody.update_attr'))
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">{{__('adminBody.update_attr')}}</a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="POST" action="{{route('admin.attribute.update', $attribute->id)}}" class="needs-validation user-add" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <h4>{{__('adminBody.update_attr')}}</h4>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('body.name')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="name" name="name" type="text" value="{{$attribute->name}}"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span> {{__('form.en_name')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="en_name" name="en_name" type="text" value="{{$attribute->en_name}}"
                                            required="">
                                    </div>
                                </div>
                                <h4 class="mt-5">{{__('body.options')}}</h4>
                                <div id="dynamicAddRemove" class="addandremove">
                                    @forelse ($options as $option)
                                    <div class="form-group row">
                                        <label for="validationCustom2"
                                            class="col-xl-3 col-md-4"><span>*</span>{{__('form.option')}}</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="options[{{$loop->index}}][option]" name="options[{{$loop->index}}][option]" type="text"
                                                value="{{$option->option}}" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom3"
                                            class="col-xl-3 col-md-4"><span>*</span>{{__('form.en_option')}}</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="options[{{$loop->index}}][en_option]" name="options[{{$loop->index}}][en_option]"
                                                value="{{$option->en_option}}" type="text">
                                        </div>
                                    </div>
                                    @empty
                                        <div class="form-group row">
                                            <label for="validationCustom2"
                                                class="col-xl-3 col-md-4"><span>*</span>{{__('form.option')}}</label>
                                            <div class="col-xl-8 col-md-7">
                                                <input class="form-control" id="options[0][option]" name="options[0][option]" type="text"
                                                    required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom3"
                                                class="col-xl-3 col-md-4"><span>*</span>{{__('form.en_option')}}</label>
                                            <div class="col-xl-8 col-md-7">
                                                <input class="form-control" id="options[0][en_option]" name="options[0][en_option]"
                                                    type="text">
                                            </div>
                                        </div>
                                        
                                    @endforelse
                                </div>
                                <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-info">{{__('form.add_other_op')}}</button></td>
                                <div class="form-group row mt-4">
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
@endsection

@push('scripts')
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = {{ Illuminate\Support\Js::from($options->count() - 1) }};
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append(`<section class="pt-1 border-top mt-3">
        <div class="form-group row">
            <label for="validationCustom2"
                class="col-xl-3 col-md-4"><span>*</span>{{__('form.option')}}</label>
            <div class="col-xl-8 col-md-7">` +
                '<input class="form-control" id="options['+i+'][option]" name="options['+i+'][option]" type="text"required="">'
                + `
            </div>
        </div>
        <div class="form-group row">
            <label for="validationCustom3"
                class="col-xl-3 col-md-4"><span>*</span>{{__('form.en_option')}}</label>
            <div class="col-xl-8 col-md-7">
                <input class="form-control" id="options[`+i+`][en_option]" name="options[`+i+`][en_option]"
                    type="text">
            </div>
        </div>` + '<div style="text-align: right; cursor: pointer; margin-right: 5.7rem" class="remove-input-field"><i class="fa fa-trash-o text-danger h5" aria-hidden="true"></i> </div></section>'); 
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('section').remove();
    });
</script>
    
@endpush

