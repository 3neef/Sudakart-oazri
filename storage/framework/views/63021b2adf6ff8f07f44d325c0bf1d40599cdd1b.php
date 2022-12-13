
<?php $__env->startSection('title', __('adminBody.VENDORS_LIST')); ?>
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
                        <th><?php echo e(__('adminBody.join')); ?></th>
                        <th><?php echo e(__('adminBody.Wallet_Balance')); ?></th>
                        <th><?php echo e(__('adminBody.suspend')); ?></th>
                        <th><?php echo e(__('adminBody.approve')); ?></th>
                        <th><?php echo e(__('body.edit')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <div class="d-flex vendor-list">
                                <span><?php echo e($vendor->first_name); ?></span>
                            </div>
                        </td>
                        <td><?php echo e($vendor->count); ?></td>
                        <?php if($vendor->shop): ?>
                        <?php if(app()->getLocale() == 'en'): ?>
                        <td><?php echo e($vendor->shop->shop_en_name); ?></td>
                        
                        <?php else: ?>
                        <td><?php echo e($vendor->shop->shop_name); ?></td>
                            
                        <?php endif; ?>
                        
                        <?php else: ?>
                        <?php if(app()->getLocale() == 'en'): ?>
                            
                        <td>N/A</td>
                        <?php else: ?>
                        <td>لا يوجد متجر</td>
                            
                        <?php endif; ?>
                            
                        <?php endif; ?>
                        <td><?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($vendor->created_at))->format('d-m-Y')); ?></td>
                        <td><?php echo money($vendor->wallet ? $vendor->wallet->balance : '0', 'OMR'); ?></td>
                        <td>
                            <div>
                                <a href="<?php echo e(route('admin.vendors.suspend', $vendor->id)); ?>" class="<?php echo e($vendor->suspended == 1 ? 'text-danger' : 'text-success'); ?>">
                                    <i class="<?php echo e($vendor->suspended == 1 ? 'fa fa-toggle-off fa-2x' : 'fa fa-toggle-on fa-2x'); ?>" 
                                        <?php if(app()->getLocale() == 'en'): ?>
                                            
                                        title="<?php echo e($vendor->suspended == 1 ? 'start' : 'stop'); ?>">
                                        <?php else: ?>
                                        title="<?php echo e($vendor->suspended == 1 ? 'فك الحجب' : 'حجب'); ?>">
                                            
                                        <?php endif; ?>
                                    </i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div>
                                <a href="<?php echo e(route('admin.vendors.approved', $vendor->id)); ?>" class="<?php echo e($vendor->approved == 0 ? 'text-danger' : 'text-success'); ?>">
                                    <i class="<?php echo e($vendor->approved == 0 ? 'fa fa-times fa-2x' : 'fa fa-check fa-2x'); ?>" 
                                        <?php if(app()->getLocale() == 'en'): ?>
                                            
                                        title="<?php echo e($vendor->approved == 0 ? 'approve' : 'usurpation'); ?>">
                                        <?php else: ?>
                                        title="<?php echo e($vendor->approved == 0 ? 'إعتماد' : 'الغاء الإعتماد'); ?>">
                                            
                                        <?php endif; ?>
                                        
                                    </i>
                                </a>
                            </div>
                        </td>

                        <td>
                            <a class="mx-1" href="<?php echo e(route('admin.vendors.edit', $vendor->id)); ?>">
                                <i class="fa fa-edit fa-2x text-primary" title="<?php echo e(__('body.edit')); ?>"></i>
                            </a>
                        </td>
                    </tr>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/panel/vendors/index.blade.php ENDPATH**/ ?>