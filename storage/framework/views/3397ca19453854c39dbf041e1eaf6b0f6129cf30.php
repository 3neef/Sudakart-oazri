<?php if($cart->count() > 0): ?>
<div>
    <div class="row">
        <div style="margin-top: 20px;">
            <div class="col-sm-12 table-responsive-xs">
                
                <table class="table cart-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col"><?php echo e(__('body.image')); ?></th>
                            <th scope="col"><?php echo e(__('body.product')); ?></th>
                            <th scope="col"><?php echo e(__('body.price')); ?></th>
                            <th scope="col"><?php echo e(__('body.quantity')); ?></th>
                            <th scope="col"><?php echo e(__('body.action')); ?></th>
                            <th scope="col"><?php echo e(__('body.total')); ?></th>
                        </tr>
                    </thead>
                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tbody>
                        <tr>
                            <td>
                                <a href="#"><img src="<?php echo e(\App\Models\Product::getImageBy($product->id)); ?>" alt=""></a>
                            </td>
                            <td><a href="#"><?php echo e($product->name); ?></a>
                                <br>
                                <?php if($product->options->count() > 0): ?>
                                   <?php $__currentLoopData = $product->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $op): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo \App\Models\Product::displayOptions($op); ?>

                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                     
                                    </div>
                                    <div class="col">
                                        <div class="qty-box">
                                        <form  class="form-inline">
                                            <div class="input-group">
                                            <input type="number" id="product-qty-mobile-<?php echo e($product->rowId); ?>" value="<?php echo e($product->qty); ?>"
                                                class="form-control">
                                                <div class="input-group-prepend">
                                                <input type="submit" class="btn btn-warning update-pro-btn-mobile" data-id="<?php echo e($product->rowId); ?>" value="<?php echo e(__('body.update_qty')); ?>">
                                                </div>
                                            
                                                </div>
                                        </form>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color"><?php echo money($product->price * $product->qty,'OMR'); ?></h2>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">
                                        <button wire:click="$emit('deleteTriggered','<?php echo e($product->rowId); ?>')" style="border:none; background:none;" class="icon">
                                            <i class="ti-close"></i>
                                        </button>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2><?php echo money($product->price,'OMR'); ?></h2>
                            </td>
                            <td>
                                <div class="qty-box">
                                    <form  class="form-inline">
                                        <div class="input-group">
                                           <input type="number" id="product-qty-<?php echo e($product->rowId); ?>" value="<?php echo e($product->qty); ?>"
                                            class="form-control">
                                            <div class="input-group-prepend">
                                               <input type="submit" class="btn btn-warning update-pro-btn" data-id="<?php echo e($product->rowId); ?>" value="<?php echo e(__('body.update_qty')); ?>">
                                             </div>
                                           
                                            </div>
                                     </form>
                                </div>
                            </td>
                            <td>
                                <button wire:click="$emit('deleteTriggered','<?php echo e($product->rowId); ?>')" style="border:none; background:none;" class="icon">
                                    <i class="ti-close"></i>
                                  </button>
                                </td>
                            <td>
                                <h2 class="td-color"><?php echo money($product->price * $product->qty,'OMR'); ?></h2>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                    
                </table>
                <div class="table-responsive-md">
                    <table class="table cart-table ">
                        <tfoot>
                            <tr>
                                <td><?php echo e(__('body.total')); ?> : </td>
                                <td>
                                    <h2><?php echo money($total,'OMR'); ?></h2>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
               
                    
                </div>
            
            </div><!--  end of col-12  -->
            
       
         
        <div class="row cart-buttons">
            <div class="col-6"><a href="#" class="btn btn-solid"><?php echo e(__('body.continue_shopping')); ?></a></div>
            <div class="col-6">
                <a href="<?php echo e(route('cart.checkout')); ?>" class="btn btn-solid"><?php echo e(__('body.checkout')); ?></a>
            </div>
        </div>
        <?php else: ?>
        
            <h3 class="text-danger text-center"><?php echo e(__('msg.cart_empty')); ?></h3>
        

 </div>
        </div>


<?php endif; ?><?php /**PATH /var/www/html/sudakart/resources/views/livewire/show-cart.blade.php ENDPATH**/ ?>