
<?php $__env->startSection('title', __('adminBody.Notifications')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                   

                    <a href="<?php echo e(route('admin.readAll')); ?>" class="btn btn-primary mt-md-0 mt-2"><?php echo e(__('adminBody.Read_all')); ?></a>
                    <a href="<?php echo e(route('admin.push.specified.create')); ?>" class="btn btn-primary mt-md-0 mt-2"><?php echo e(__('adminBody.send')); ?></a>
                    <a href="<?php echo e(route('admin.pushnotifications.create')); ?>" class="btn btn-primary mt-md-0 mt-2"><?php echo e(__('adminBody.bulk')); ?></a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="all-package coupon-table table table-striped">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('adminBody.no')); ?></th>
                                    <th><?php echo e(__('adminBody.Name')); ?></th>
                                    <th><?php echo e(__('adminBody.Status')); ?></th>
                                    <th><?php echo e(__('adminBody.Created_On')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-row-id="1">
                                    <td>
                                        <?php echo e($noti->id); ?>

                                    </td>
                                    
                                    <td><?php echo e($noti->title); ?></td>
                                    
                                    <td>
                                        <?php echo e($noti->message); ?>

                                    </td>
                                    
                                    <td class="list-date"><?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($noti->created_at))->format('d-m-Y')); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <?php echo e($notifications->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/promotions/notifications/index.blade.php ENDPATH**/ ?>