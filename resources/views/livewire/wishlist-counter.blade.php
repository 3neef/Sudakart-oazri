<div>
    <div class="site-header__cart icon-btn mx-1">
        <div class="wrapper-top-cart onhover-div mobile-cart">

            <div class="btn btn-inverse btn-block btn-lg dropdown-toggle" id="cart-top-right">
              <a href="@auth('web') {{ route('wishlist.index') }}@else # @endauth" style="color: #000;"> <i class="fa fa-heart" 
                style="font-size:25px;"></i></a>
             
              <div id="CartCount_sticky" class="site-header__cart-count">
                
                <span class="cart-products-count">
                  @auth('web') 
                   {{ $count }}
                  @else 
                   0
                  @endauth
              </span>
              </div>
            </div>                  
        </div>
    </div>
</div>
