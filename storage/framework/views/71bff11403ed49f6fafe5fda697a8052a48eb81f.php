<div>
    
                
        <div class="site-header__cart icon-btn">
          <div class="wrapper-top-cart onhover-div mobile-cart">

              <div class="btn btn-inverse btn-block btn-lg dropdown-toggle" id="cart-top-right">
                <i class="fa fa-shopping-cart" style="font-size:25px;"></i>
                <div id="CartCount_sticky" class="site-header__cart-count">
                  <span class="cart-products-count"><?php echo e($cart_count); ?></span>
                </div>
              </div>

              
                <ul class="show-div shopping-cart rounded">
                    <li>
                        <div class="total">
                            <h5><?php echo e(__('body.subtotal')); ?> : <span><?php echo e($total); ?></span></h5>
                        </div>
                    </li>
                    <li>
                        <div class="buttons"><a href="<?php echo e(route('cart.index')); ?>" class="view-cart"><?php echo e(__('body.view_cart')); ?></a> 
                                <a href="<?php echo e(route('cart.checkout')); ?>" class="checkout"><?php echo e(__('body.checkout')); ?></a></div>
                    </li>
                </ul>
              

          </div>
        </div>
        
    
</div>
<?php /**PATH /var/www/html/sudakart/resources/views/livewire/cart-counter.blade.php ENDPATH**/ ?>