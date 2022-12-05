<div>
    <div class="site-header__cart icon-btn mx-1">
        <div class="wrapper-top-cart onhover-div mobile-cart">

            <div class="btn btn-inverse btn-block btn-lg dropdown-toggle" id="cart-top-right">
              <a href="<?php if(auth()->guard('web')->check()): ?> <?php echo e(route('wishlist.index')); ?><?php else: ?> # <?php endif; ?>" style="color: #000;"> <i class="fa fa-heart" 
                style="font-size:25px;"></i></a>
             
              <div id="CartCount_sticky" class="site-header__cart-count">
                
                <span class="cart-products-count">
                  <?php if(auth()->guard('web')->check()): ?> 
                   <?php echo e($count); ?>

                  <?php else: ?> 
                   0
                  <?php endif; ?>
              </span>
              </div>
            </div>                  
        </div>
    </div>
</div>
<?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/livewire/wishlist-counter.blade.php ENDPATH**/ ?>