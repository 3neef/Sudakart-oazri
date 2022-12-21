<div>
    <div class="order-box">
        <div class="title-box">
            <div><?php echo e(__('body.product')); ?> <span><?php echo e(__('body.total')); ?></span></div>
        </div>
        <ul class="qty">
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($product->name); ?> × <?php echo e($product->qty); ?> <span><?php echo money($product->price * $product->qty,'OMR'); ?></span></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
       
        <ul class="total">
            <?php if($total_all > $total): ?>
            <li><?php echo e(__('body.discounted_total')); ?> <span class="count" id="cart-total-checkout">@moeney($total,'OMR')</span></li>
            <li> <?php echo e(__('body.total')); ?> <span class="count" id="cart-total-checkout"><del>@moeney( $total_all,'OMR')</del></span></li>
            <?php else: ?>
              <li><?php echo e(__('body.total')); ?> <span class="count" id="cart-total-checkout"><?php echo money($total,'OMR'); ?></span></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/livewire/show-check-out.blade.php ENDPATH**/ ?>