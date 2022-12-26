
<?php $__env->startSection('title', __('adminNav.Logs')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('adminDash.id')); ?></th>
                                    <th><?php echo e(__('body.region')); ?></th>
                                    <th><?php echo e(__('body.delivary_price')); ?></th>
                                    <th><?php echo e(__('adminBody.date')); ?></th>
                                    <th><?php echo e(__('adminBody.Actions')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    

                                    <td data-field="name"><?php echo e($activity->id); ?></td>

                                    <td data-field="name"><?php echo e($activity->log_name); ?></td>

                                    <td data-field="price"><?php echo e($activity->description); ?></td>

                                    <td data-field="price"><?php echo e($activity->created_at); ?></td>

                                

                                    <td>
                                        <a href="<?php echo e(route('admin.region.edit', $activity->id)); ?>">
                                            <i class="fa fa-eye fa-2x text-primary" title="<?php echo e(__('body.show')); ?>"></i>
                                        </a>
                                    </td>
                                </tr>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/panel/settings/activities.blade.php ENDPATH**/ ?>