
<?php $__env->startSection('title', __('adminNav.vip_customer')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body vendor-table">
            <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th><?php echo e(__('adminBody.customer_name')); ?></th>
                        <th><?php echo e(__('body.Orders')); ?></th>
                        <th><?php echo e(__('adminBody.Create_Date')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $all_customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                        <?php echo e($customer->name); ?>

                        </td>
                        <td><?php echo e($customer->orders->count()); ?></td>
                        <td><?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($customer->created_at))->format('d-m-Y')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/vendors/customers/vip.blade.php ENDPATH**/ ?>