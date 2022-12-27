
<?php $__env->startSection('title', __('adminBody.dirvers')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">

            <a href="<?php echo e(route('admin.driver-create')); ?>" class="btn btn-primary mt-md-0 mt-2"><?php echo e(__('body.create_account')); ?></a>
        </div>
        <div class="card-body vendor-table">
            <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th><?php echo e(__('adminDash.id')); ?></th>
                        <th><?php echo e(__('body.name')); ?></th>
                        <th><?php echo e(__('body.Second_Phone')); ?></th>
                        <th><?php echo e(__('body.email')); ?></th>
                        <th><?php echo e(__('body.address')); ?></th>
                        <th><?php echo e(__('adminBody.join')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($driver->id); ?></td>
                        <td><?php echo e($driver->name); ?></td>
                        <td><?php echo e($driver->secondary_phone); ?></td>
                        <td><?php echo e($driver->secondary_email); ?></td>
                        <td><?php echo e($driver->address); ?></td>
                        <td><?php echo e($driver->created_at); ?></td>
                    </tr>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/panel/drivers/index.blade.php ENDPATH**/ ?>