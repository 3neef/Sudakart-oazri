
<?php $__env->startSection('title', __('adminBody.SUSPENDED_VENDORS_LIST')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body vendor-table">
            <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th><?php echo e(__('adminBody.Vendor')); ?></th>
                        <th><?php echo e(__('adminBody.products')); ?></th>
                        <th><?php echo e(__('adminBody.Store_Name')); ?></th>
                        <th><?php echo e(__('adminBody.Create_Date')); ?></th>
                        <th><?php echo e(__('adminBody.Wallet_Balance')); ?></th>
                        <th><?php echo e(__('adminBody.Actions')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <div class="d-flex vendor-list">
                                <img src="assets/images/team/2.jpg" alt=""
                                    class="img-fluid img-40 rounded-circle blur-up lazyloaded">
                                <span><?php echo e($vendor->first_name); ?></span>
                            </div>
                        </td>
                        <td><?php echo e($vendor->count); ?></td>
                        <?php if($vendor->shop): ?>
                        <td><?php echo e($vendor->shop->shop_en_name); ?></td>
                        
                        <?php else: ?>
                        <td>N/A</td>
                            
                        <?php endif; ?>
                        <td><?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($vendor->created_at))->format('d-m-Y')); ?></td>
                        <td><?php echo e($vendor->wallet->balance); ?></td>
                        <td>
                            <div>
                                <a href="<?php echo e(route('admin.vendors.suspend', $vendor->id)); ?>">
                                    <i class="fa fa-stop" title="stop"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/vendors/suspended.blade.php ENDPATH**/ ?>