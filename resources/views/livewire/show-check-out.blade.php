<div>
    <div class="order-box">
        <div class="title-box">
            <div>{{ __('body.product') }} <span>{{ __('body.total') }}</span></div>
        </div>
        <ul class="qty">
            @foreach($cart as $product)
            <li>{{ $product->name }} × {{ $product->qty }} <span>@money($product->price * $product->qty,'OMR')</span></li>
            @endforeach
        </ul>
       
        <ul class="total">
            @if($total_all > $total)
            <li>{{ __('body.discounted_total') }} <span class="count" id="cart-total-checkout">@moeney($total,'OMR')</span></li>
            <li> {{ __('body.total') }} <span class="count" id="cart-total-checkout"><del>@moeney( $total_all,'OMR')</del></span></li>
            @else
              <li>{{ __('body.total') }} <span class="count" id="cart-total-checkout">@money($total,'OMR')</span></li>
            @endif
        </ul>
    </div>
</div>
