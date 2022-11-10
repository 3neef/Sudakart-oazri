@if($cart->count() > 0)
<div>
    <div class="row">
        <div style="margin-top: 20px;">
            <div class="col-sm-12 table-responsive-xs">
                
                <table class="table cart-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">{{ __('body.image') }}</th>
                            <th scope="col">{{ __('body.product') }}</th>
                            <th scope="col">{{ __('body.price') }}</th>
                            <th scope="col">{{ __('body.quantity') }}</th>
                            <th scope="col">{{ __('body.action') }}</th>
                            <th scope="col">{{ __('body.total') }}</th>
                        </tr>
                    </thead>
                    @foreach($cart as $product)
                    <tbody>
                        <tr>
                            <td>
                                <a href="#"><img src="{{ \App\Models\Product::getImageBy($product->id) }}" alt=""></a>
                            </td>
                            <td><a href="#">{{ $product->name }}</a>
                                <br>
                                @if($product->options->count() > 0)
                                   @foreach($product->options as $op)
                                    {!! \App\Models\Product::displayOptions($op)  !!}
                                   @endforeach
                                @endif
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                     
                                    </div>
                                    <div class="col">
                                        <div class="qty-box">
                                        <form  class="form-inline">
                                            <div class="input-group">
                                            <input type="number" id="product-qty-mobile-{{ $product->rowId }}" value="{{ $product->qty }}"
                                                class="form-control">
                                                <div class="input-group-prepend">
                                                <input type="submit" class="btn btn-warning update-pro-btn-mobile" data-id="{{ $product->rowId }}" value="{{ __('body.update_qty') }}">
                                                </div>
                                            
                                                </div>
                                        </form>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">@money($product->price * $product->qty,'OMR')</h2>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">
                                        <button wire:click="$emit('deleteTriggered','{{ $product->rowId }}')" style="border:none; background:none;" class="icon">
                                            <i class="ti-close"></i>
                                        </button>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2>@money($product->price,'OMR')</h2>
                            </td>
                            <td>
                                <div class="qty-box">
                                    <form  class="form-inline">
                                        <div class="input-group">
                                           <input type="number" id="product-qty-{{ $product->rowId }}" value="{{ $product->qty }}"
                                            class="form-control">
                                            <div class="input-group-prepend">
                                               <input type="submit" class="btn btn-warning update-pro-btn" data-id="{{ $product->rowId }}" value="{{ __('body.update_qty') }}">
                                             </div>
                                           
                                            </div>
                                     </form>
                                </div>
                            </td>
                            <td>
                                <button wire:click="$emit('deleteTriggered','{{ $product->rowId }}')" style="border:none; background:none;" class="icon">
                                    <i class="ti-close"></i>
                                  </button>
                                </td>
                            <td>
                                <h2 class="td-color">@money($product->price * $product->qty,'OMR')</h2>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                   
                    
                </table>
                <div class="table-responsive-md">
                    <table class="table cart-table ">
                        <tfoot>
                            <tr>
                                <td>{{ __('body.total') }} : </td>
                                <td>
                                    <h2>@money($total,'OMR')</h2>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
               
                    
                </div>
            
            </div><!--  end of col-12  -->
            
       
         
        <div class="row cart-buttons">
            <div class="col-6"><a href="#" class="btn btn-solid">{{ __('body.continue_shopping') }}</a></div>
            <div class="col-6">
                <a href="{{ route('cart.checkout') }}" class="btn btn-solid">{{ __('body.checkout') }}</a>
            </div>
        </div>
        @else
        
            <h3 class="text-danger text-center">{{ __('msg.cart_empty') }}</h3>
        

 </div>
        </div>


@endif