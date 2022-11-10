
<?php $__env->startSection('title', __('adminBody.Resolved_Tickets')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-inline search-form search-box">
                        
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('adminBody.Ticket_Number')); ?></th>
                                    <th><?php echo e(__('adminBody.date')); ?></th>
                                    <th><?php echo e(__('adminBody.Subject')); ?></th>
                                    <th><?php echo e(__('adminBody.Status')); ?></th>
                                    <th><?php echo e(__('adminBody.option')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $complaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>#<?php echo e($complaint->id); ?></td>

                                    <td><?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($complaint->created_at))->format('d-m-Y')); ?></td>

                                    <td><?php echo e($complaint->subject); ?></td>
                                    <?php if($complaint->status == 'pending'): ?>
                                    <td class="order-pending">
                                        
                                        <?php elseif($complaint->status == 'On-hold'): ?>
                                        <td class="order-warning">
                                        <?php elseif($complaint->status == 'resolved'): ?>
                                        <td class="order-success">
                                            <?php elseif($complaint->status == 'canceled' || $complaint->status == 'returned'): ?>
                                            <td class="order-cancle">
                                            <?php elseif($complaint->status == 'packaging'): ?>
                                            <td class="order-continue">
                                        
                                    <?php endif; ?>
                                     <span><?php echo e($complaint->status); ?></span>
                                    </td>

                                    <td>
                                        <a href="<?php echo e(route('admin.complaints.show', $complaint->id)); ?>">
                                            <i class="fa fa-edit" title="show"></i>
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/complaints/resolved.blade.php ENDPATH**/ ?>