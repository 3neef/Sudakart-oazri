@extends('layouts.app2')
@section('title', __('adminBody.update_a_product'))
@section('content')
<div class="container-fluid">
    @if ($errors->count() > 0)
        {{$errors}}
    @endif
    <form method="POST" action="{{route('admin.products.update', $pro->id)}}" enctype="multipart/form-data">
        @csrf
       @method('PUT')
        <div class="row product-adding">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5>{{__('form.general')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <div class="form-group">
                                <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>
                                    {{__('body.name')}}</label>
                                <input class="form-control" value="{{$pro->name}}" name="name" type="text" required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>
                                    {{__('form.en_name')}}</label>
                                <input class="form-control"  value="{{$pro->en_name}}" name="en_name"  type="text" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label categories-basic"><span>*</span>
                                    {{__('form.categories')}}</label>
                                <select class="custom-select form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" value="{{$pro->category_id}}" required>
                                    @foreach($categories as $id => $entry)
                                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    {{__('body.price')}}</label>
                                <input class="form-control"  value="{{$pro->price}}" name="price" step="0.1"  type="number" required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    {{__('body.sku')}}</label>
                                <input class="form-control"   value="{{$pro->sku != null ? $pro->sku : 'N/A'}}" id="sku" name="sku" type="text" required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    {{__('form.cost')}}</label>
                                <input class="form-control"  value="{{$pro->cost > 0 ? $pro->cost : 0 }}" min="{{ $pro->cost < 0 ? 0 : 0 }}" name="cost"  type="number" required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    {{__('body.quantity')}}</label>
                                <input class="form-control"  value="{{$pro->quantity > 0 ? $pro->quantity : 0 }}" min="{{ $pro->quantity < 0 ? 0 : 0 }}" name="quantity"  type="number" required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    {{__('form.warranty')}}</label>
                                <input class="form-control"  value="{{$pro->warranty}}" name="warranty"  type="text" required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    {{__('body.weight')}}</label>
                                <input class="form-control"  id="weight" name="weight" value="{{$pro->weight}}" type="number" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label"><span>*</span>{{__('body.free_shipping')}}</label>
                                <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                    <label class="d-block" for="edo-ani">
                                        <input class="radio_animated" id="edo-ani" value="1" type="radio"
                                            name="frs">
                                        {{__('form.free')}}
                                    </label>
                                    <label class="d-block" for="edo-ani1">
                                        <input class="radio_animated" id="edo-ani1" value="0" type="radio"
                                            name="frs">
                                        {{__('form.regular')}}
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span></span>
                                    {{__('body.image')}}</label>
                                    <input class="form-control" type="file" id="formFileMultiple" id="images" name="images[]" multiple />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5>{{__('form.add_des')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <div class="form-group mb-0">
                                <div class="description-sm">
                                    <textarea value="{{$pro->description}}" name="description" cols="10" rows="4">{{$pro->description}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>{{__('form.add_en_des')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <div class="form-group mb-0">
                                <div class="description-sm">
                                    <textarea value="{{$pro->en_description}}" name="en_description" cols="10" rows="4">{{$pro->en_description}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>{{__('body.options')}}</h5>
                    </div>
                    <div class="card-body">
                        <div id="dynamicAddRemove" class="addandremove">
                            <div class="form-group row">
                                <label for="validationCustom2"
                                    class="col-xl-3 col-md-4"><span>*</span>{{__('adminBody.option')}}</label>
                                <div class="col-xl-8 col-md-7">
                                        <select class="custom-select w-100 form-control {{ $errors->has('brand') ? 'is-invalid' : '' }}" id="options[0][option_id]" name="options[0][option_id]" >
                                            <option value="" selected>{{__('body.Choose')}}</option>
                                            @foreach($options as $id => $entry)
                                                <option value="{{ $id }}" {{ old('optilon_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    {{__('form.increment')}}</label>
                                <input class="form-control"  id="options[0][increment]" name="options[0][increment]"  type="number">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    {{__('body.quantity')}}</label>
                                <input class="form-control"  id="options[0][quantity]" name="options[0][quantity]"  type="number" >
                            </div>
                        </div>
                        <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">{{__('form.add_other_op')}}</button></td>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-0">
            <div class="product-buttons">
                <button type="submit" class="btn btn-outline-primary">{{__('adminBody.save')}}</button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append(`<section class="pt-1 border-top mt-3">
        <div class="form-group row">
            <label for="validationCustom2"
                class="col-xl-3 col-md-4"><span>*</span>{{__('adminBody.option')}}</label>
            <div class="col-xl-8 col-md-7">` +
                '<select class="custom-select w-100 form-control {{ $errors->has('') ? '' : '' }}" id="options['+i+'][option_id]" name="options['+i+'][option_id]" required>'
                + `
                @foreach($options as $id => $entry)
                <option value="{{ $id }}" {{ old('option_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="validationCustom02" class="col-form-label"><span>*</span>
                {{__('form.increment')}}</label>
                    <input class="form-control"  id="options[`+i+`][increment]" name="options[`+i+`][increment]"  type="number" required="">
        </div>
        <div class="form-group">
            <label for="validationCustom02" class="col-form-label"><span>*</span>
                {{__('body.quantity')}}</label>
            <input class="form-control"  id="options[`+i+`][quantity]" name="options[`+i+`][quantity]"  type="number" required="">
        </div>
                            ` + '<div style="text-align: right; cursor: pointer; margin-right: 5.7rem" class="remove-input-field"><i class="fa fa-trash-o text-danger h5" aria-hidden="true"></i> </div></section>'); 
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('section').remove();
    });
</script>
    
@endpush