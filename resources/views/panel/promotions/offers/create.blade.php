@extends('layouts.app2')
@section('title', __('adminBody.New_Offer'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">{{__('adminBody.New_Offer')}}</a></li>
                    </ul>
                    @if ($errors->count() > 0)
                    {{$errors}}
                        
                    @endif
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="POST" action="{{route('admin.offers.store')}}" class="needs-validation user-add">
                                @csrf
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('body.name')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="name" name="name" type="text"
                                            required="">
                                    </div>
                                    @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span> {{__('form.en_name')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="en_name" name="en_name" type="text"
                                            required="">
                                    </div>
                                    @if($errors->has('en_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('en_name') }}
                                    </div>
                                @endif
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span> {{__('adminBody.Discount')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="discount" name="discount" type="number"
                                        step="0.01"
                                            required="">
                                    </div>
                                     @if($errors->has('discount'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('discount') }}
                                    </div>
                                @endif
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span>{{__('adminBody.Expire_Date')}}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="expire_at" name="expire_at" type="date"
                                            required="">
                                    </div>
                                     @if($errors->has('expire_at'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('expire_at') }}
                                    </div>
                                @endif
                                </div>
                                <div id="dynamicAddRemove" class="addandremove">
                                    <div class="form-group row">
                                        <label for="validationCustom2"
                                            class="col-xl-3 col-md-4"><span>*</span>{{__('body.product')}}</label>
                                        <div class="col-xl-8 col-md-7">
                                                <select class="custom-select w-100 form-control {{ $errors->has('brand') ? 'is-invalid' : '' }}" id="products[0][product_id]" name="products[0][product_id]" required>
                                                    @foreach($products as $id => $entry)
                                                        <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                         @if($errors->has('products[0][product_id]'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('products[0][product_id]') }}
                                    </div>
                                @endif
                                    </div>
                                </div>
                                <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-info">{{__('adminBody.new_product')}}</button></td>
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
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append(`<section class="pt-1 border-top mt-3">
        <div class="form-group row">
            <label for="validationCustom2"
                class="col-xl-3 col-md-4"><span>*</span>{{__('body.product')}}</label>
            <div class="col-xl-8 col-md-7">` +
                '<select class="custom-select w-100 form-control {{ $errors->has('') ? '' : '' }}" id="products['+i+'][product_id]" name="products['+i+'][product_id]" required>'
                + `
                @foreach($products as $id => $entry)
                <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                @endforeach
                </select>
            </div>
        </div>` + '<div style="text-align: right; cursor: pointer; margin-right: 5.7rem" class="remove-input-field"><i class="fa fa-trash-o text-danger h5" aria-hidden="true"></i> </div></section>'); 
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('section').remove();
    });
</script>
    
@endpush