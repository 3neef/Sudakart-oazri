
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
                                    <th><?php echo e(__('ID')); ?></th>
                                    <th><?php echo e(__('Log Model')); ?></th>
                                    <th><?php echo e(__('Made By')); ?></th>
                                    <th><?php echo e(__('User Type')); ?></th>
                                    <th><?php echo e(__('Log Description')); ?></th>
                                    <th><?php echo e(__('Made at')); ?></th>
                                    <th><?php echo e(__('Show Changes')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    

                                    <td data-field="name"><?php echo e($activity->id); ?></td>

                                    <td data-field="name"><?php echo e($activity->log_name); ?></td>

                                    <td data-field="name"><?php echo e($activity->causer ? $activity->causer->userable->name : $activity->causer->userable->first_name); ?></td>

                                    <td data-field="price"><?php echo e($activity->causer ? $activity->causer->userable_type : ''); ?></td>

                                    <td data-field="price"><?php echo e($activity->description); ?></td>

                                    <td data-field="price"><?php echo e($activity->created_at); ?></td>

                                

                                    <td>
                                        <a href="<?php echo e(route('admin.activities.show', $activity->id)); ?>">
                                            <i class="fa fa-eye fa-2x text-primary" title="<?php echo e(__('body.show')); ?>"></i>
                                        </a>
                                    </td>
                                </tr>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <?php echo $activities->links(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/panel/settings/activities/index.blade.php ENDPATH**/ ?>