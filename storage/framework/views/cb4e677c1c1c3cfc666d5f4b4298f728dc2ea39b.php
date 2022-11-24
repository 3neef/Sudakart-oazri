<?php if($product->attributes): ?>
    
<?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $att): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="form-group col-lg-7">
    <label for="<?php echo e($att->en_name); ?>"><?php echo e(__('body.Choose')); ?> <?php if(app()->getLocale() == 'en'): ?> <?php echo e($att->en_name); ?> <?php else: ?> <?php echo e($att->name); ?> <?php endif; ?></label>
    <select  name="options[<?php echo e($att->en_name); ?>]" class="form-control options">
        <option value=""></option>
            <?php $__currentLoopData = $att->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
                <option   option value="<?php echo e($option->id); ?>" data-increment="<?php echo e($product->getIncrement($option->id)->increment); ?>"><?php if(app()->getLocale() == 'en'): ?> <?php echo e($option->en_option); ?> <?php else: ?> <?php echo e($option->option); ?> <?php endif; ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<div class="form-group col-lg-7">
    <label><?php echo e(__('adminBody.Quantity')); ?></label>
    <input type="text" class="form-control" name="quantity">
</div><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/orders/options.blade.php ENDPATH**/ ?>