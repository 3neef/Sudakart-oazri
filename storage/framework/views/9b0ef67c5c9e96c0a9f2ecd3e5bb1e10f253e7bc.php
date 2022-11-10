<div>
     <!--section start-->
     <section class="wishlist-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 table-responsive-xs">
                    <?php if($favs->count() > 0): ?>
                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col"><?php echo e(__('body.image')); ?></th>
                                <th scope="col"><?php echo e(__('body.product')); ?></th>
                                <th scope="col"><?php echo e(__('body.price')); ?></th>
                                <th scope="col"><?php echo e(__('body.availability')); ?></th>
                                <th scope="col"><?php echo e(__('body.action')); ?></th>
                            </tr>
                        </thead>

                        <?php $__currentLoopData = $favs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <tbody>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('product.show',$fav->product->id)); ?>"><img src="<?php echo e($fav->product->productImages[0]); ?>" alt=""></a>
                                </td>
                                <td><a href="#">cotton shirt</a>
                                    <div class="mobile-cart-content row">
                                        <div class="col">
                                            <p>in stock</p>
                                        </div>
                                        <div class="col">
                                            <h2 class="td-color"><?php echo e($fav->product->price); ?></h2>
                                        </div>
                                        <div class="col">
                                            <?php if($fav->product->attributes->count() == 0): ?>
                                            <form id="add-to-cart-form-no-option-<?php echo e($fav->product->id); ?>" action="<?php echo e(route('cart.addTocart')); ?>" 
                                            class="add-to-cart-form-no-option" method="post">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="product_id" value="<?php echo e($fav->product->id); ?>">
                                            <button class="add-to-cart-no-option" style="border:none; background:none;"
                                             data-id="<?php echo e($fav->product->id); ?>" title="Add to cart">
                                                <i class="ti-shopping-cart"></i>
                                            </button>
                                            </form>
                                            <?php else: ?> 
                                            <a  href="<?php echo e(route('product.show',$fav->product->id)); ?>" title="Add to cart">
                                                    <i class="ti-shopping-cart"></i>
                                            </a>
                                            <?php endif; ?>
                                            <button wire:click="removeFav('<?php echo e($fav->product->id); ?>')" style="border:none; background:none;" class="icon">
                                                <i class="ti-close"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2><?php echo e($fav->product->price); ?></h2>
                                </td>
                                <td>
                                    <p>in stock</p>
                                </td>
                                <td>
                                    <div class="col">
                                        <?php if($fav->product->attributes->count() == 0): ?>
                                        <form id="add-to-cart-form-no-option-<?php echo e($fav->product->id); ?>" action="<?php echo e(route('cart.addTocart')); ?>" 
                                        class="add-to-cart-form-no-option" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="product_id" value="<?php echo e($fav->product->id); ?>">
                                        <button class="add-to-cart-no-option" style="border:none; background:none;"
                                         data-id="<?php echo e($fav->product->id); ?>" title="Add to cart">
                                            <i class="ti-shopping-cart"></i>
                                        </button>
                                        </form>
                                        <?php else: ?> 
                                       
                                        <button style="border:none; background:none;"> <a  href="<?php echo e(route('product.show',$fav->product->id)); ?>" title="Add to cart"> 
                                            <i class="ti-shopping-cart"></i></a></button>
                                        
                                        <?php endif; ?>
                                        <button wire:click="removeFav('<?php echo e($fav->product->id); ?>')" style="border:none; background:none;" class="icon">
                                            <i class="ti-close"></i>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                       
                          
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </table>
                    <?php else: ?> 
                    <h3 class="text-center text-danger"><?php echo e(__('msg.wishlist_msg')); ?></h3>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row wishlist-buttons">
                <div class="col-12">
                    <a href="<?php echo e(route('home.web')); ?>" class="btn btn-solid"><?php echo e(__('body.continue_shopping')); ?></a> 
                    <?php if($favs->count() > 0): ?>
                    <a href="<?php echo e(route('cart.checkout')); ?>" class="btn btn-solid"><?php echo e(__('body.checkout')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!--section end-->
</div>
<?php /**PATH /var/www/html/sudakart/resources/views/livewire/show-wishlist.blade.php ENDPATH**/ ?>