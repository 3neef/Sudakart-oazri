
<?php $__env->startSection('title', __('adminBody.PAYMENTS_LIST')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                </div>

                <div class="card-body">
                    <div class="card-body order-datatable">
                    <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('adminBody.Order_Id')); ?></th>
                                    <th><?php echo e(__('adminBody.Transaction_Id')); ?></th>
                                    <th><?php echo e(__('adminBody.date')); ?></th>
                                    <th><?php echo e(__('adminBody.customer_name')); ?></th>
                                    <th><?php echo e(__('adminBody.Notes')); ?></th>
                                    <th><?php echo e(__('adminBody.Amount')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <tr>
                                    <td><?php echo e($payment->order_id); ?></td>

                                    <td>#<?php echo e($payment->uuid); ?></td>

                                    <td><?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($payment->created_at))->format('d-m-Y')); ?></td>

                                    <td><?php echo e($payment->wallet ? $payment->wallet->accountable->first_name : $payment->wallet->accountable->name); ?></td>

                                    <td><?php echo e($payment->notes); ?></td>

                                    <td><?php echo money($payment->amount, 'OMR'); ?></td>
                                </tr>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <?php echo $payments->links(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/accounting/payments.blade.php ENDPATH**/ ?>