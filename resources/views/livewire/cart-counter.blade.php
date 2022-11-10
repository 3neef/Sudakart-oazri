<div>
    
                
        <div class="site-header__cart icon-btn">
          <div class="wrapper-top-cart onhover-div mobile-cart">

              <div class="btn btn-inverse btn-block btn-lg dropdown-toggle" id="cart-top-right">
                <i class="fa fa-shopping-cart" style="font-size:25px;"></i>
                <div id="CartCount_sticky" class="site-header__cart-count">
                  <span class="cart-products-count">{{ $cart_count }}</span>
                </div>
              </div>

              
                <ul class="show-div shopping-cart rounded">
                    <li>
                        <div class="total">
                            <h5>{{ __('body.subtotal') }} : <span>{{ $total }}</span></h5>
                        </div>
                    </li>
                    <li>
                        <div class="buttons"><a href="{{ route('cart.index') }}" class="view-cart">{{ __('body.view_cart') }}</a> 
                                <a href="{{ route('cart.checkout') }}" class="checkout">{{ __('body.checkout') }}</a></div>
                    </li>
                </ul>
              

          </div>
        </div>
        
    
</div>
