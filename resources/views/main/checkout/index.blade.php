@extends('main/layouts/app')
@section('content')

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row" style="padding-top: 20px;">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ __('body.checkout') }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{ __('body.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('body.checkout') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="section-b-space">
    <div class="container">
         @if($errors->any())
           <div class="row">
             <div class="col-lg-12">
                @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
                @endforeach
             </div>
           </div>
          @endif
        <div class="checkout-page">
            <div class="checkout-form">
                <form action="{{ route('order.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>{{ __('body.billing_details') }}</h3>
                            </div>
                            <div class="row check-out">
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">{{ __('body.name') }}</div>
                                    <input type="text" name="name" value="{{ Auth::guard('web')->user()->userable->name }}" placeholder="Name" required>
                                </div>
                                
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">{{ __('body.phone') }}</div>
                                    <input type="text" name="phone" value="{{ Auth::guard('web')->user()->phone }}" placeholder="" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">{{ __('body.email') }}</div>
                                    <input type="text" name="email" value="{{ Auth::guard('web')->user()->email }}" placeholder="" required>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">{{ __('body.region') }}</div>
                                    <select name="region_id" id="region_id" class="form-control" required>
                                        <option value="" selected>{{ __('body.Select_region') }}</option>
                                        @forelse ($regions as $region)
                                        {{-- {{ dd($regions['regions']) }} --}}
                                        @if ($region['state'] != '.')
                                        <option value="{{ $region['region_id'] }}">
                                            {{ $region['state'] }}
                                            </option>
                                        @endif
                                            
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                    {{-- <input type="text" name="address" value="" placeholder="Street address" required> --}}
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">{{ __('body.address') }}</div>
                                    <input type="text" name="address" value="" placeholder="{{ __('body.address') }}" required>
                                </div>

                                <div>
                                    <input type="hidden" name="coupon_id" id="coupon-hidden-input">
                                </div>
                                <div>
                                    <input type="hidden" name="coupon" id="coupon-code-hidden-input">
                                </div>

                               

                                <div class="form-group col-md-12 col-sm-12 col-xs-12" id="coupon-area">
                                    <div class="input-group">
                                        <input type="text" id="coupon-input" placeholder="" 
                                         class="form-control">
                                         <div class="input-group-prepend">
                                            <input class="btn btn-warning" id="apply-coupon-btn" value="{{ __('body.apply_coupon') }}">
                                          </div>
                                        
                                     </div>
                                </div>
                               
                               
                              
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details">
                                @livewire('show-check-out')
                                <div class="payment-box">
                                    <div class="upper-box">
                                        <div class="payment-options">
                                            <h4 class="mb-3">{{ __('body.shipping_cost') }}</h4>
                                            <input type="text" name="shipping_cost_input" id="shipping_cost_input" readonly>
                                            <input type="hidden" name="shipping_cost" id="shipping_cost">
                                            <div style="display: flex; flex-direction: row; width:80%">
                                                {{-- <div>
                                                    <ul>
                                                        @foreach($shippings as $shipping)
                                                        <li>
                                                           
                                                            <div class="radio-option">
                                                                <input type="radio" name="delivery_method_id" value="{{ $shipping->id }}"
                                                                 data-price="{{  $shipping->price }}" value="{{ $shipping->id }}"
                                                                  class="shipping-methods-price" id="payment-{{ $shipping->id }}"
                                                                  style="position: relative" required>
                                                                <label for="delivery_method_id">{{ $shipping->name }}</label>
                                                            </div>
                                                            
                                                        </li>
                                                        @endforeach
                                                       
                                                    </ul>
                                                </div>
                                                <div style="margin-left: auto;">
                                                    <h4><span style="color:#ff4c3b;" id="total_price-shipping"></span></h4>
                                                </div> --}}
                                            </div>
                                            
                                        </div>
                                        <div class="payment-options">
                                            <h4 class="mb-3">{{ __('body.payment_method') }}</h4>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                
                                                <select name="payment_method" id="payment_method" class="form-control" required>
                                                    <option value="" selected>{{ __('labels.select_payment') }}</option>
                                                    <option value="cash">
                                                    {{ __('body.cash') }}
                                                    </option>
                                                    <option value="online">
                                                    {{ __('body.online') }}
                                                    </option>
                                                    <option value="bank">
                                                        {{ __('body.bank_transfer') }}
                                                    </option>
                                                </select>
                                                {{-- <input type="text" name="address" value="" placeholder="Street address" required> --}}
                                            </div>
                                            {{-- <ul>
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="radio" name="payment_method" value="cash">
                                                        <label for="">{{ __('body.cash') }}</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="radio" name="payment_method" value="online">
                                                        <label for="">{{ __('body.online') }}</label>
                                                    </div>
                                                </li>
                                               
                                            </ul> --}}
                                        </div>
                                       
                                    </div>
                                    <div class="text-end"> <input type="submit" value="{{ __('body.place_order') }}" class="btn-solid btn"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- section end -->

@endsection

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="bank-info-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">{{ __('body.bank_title') }}</h5>
            </div>
            <div class="modal-body">
               <h5>{{ __('labels.bank_account_name') }}</h5>
               <h5>{{ __('labels.bank_name') }}</h5>
               <h5>{{ __('labels.account_number') }} : 0375042367640016</h5>
               <h5>{{ __('labels.send_on_whats') }} : 93734317 {{ __('labels.confirm_order') }}</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="clsBtnBank" data-dismiss="modal">{{ __('body.Close') }}</button>

            </div>
        </div>
    </div>
</div>

@push('custom-js')
<script>
    $(document).ready(function() {
        $("#region_id").on('change', function() {
            var region_id = $(this).val();
            $("#shipping_cost_input").val("{{ $regions[0]['region_delivery_fee'] }}");
            $("#shipping_cost").val("{{ $regions[0]['region_delivery_fee'] }}");
        });

        $("#payment_method").on('change', function() {
            var payment_method = $(this).val();
            if(payment_method == 'bank') {
                $('#bank-info-modal').modal('show');
            }
        });

        $('#clsBtnBank').on('click',function () {  
            $('#bank-info-modal').modal('hide');
        });
        
    })
</script>
@endpush