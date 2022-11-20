
<?php $__env->startSection('title', __('adminBody.TRANSACTIONS_LIST')); ?>
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
                                    <th><?php echo e(__('adminBody.Type')); ?></th>
                                    <th><?php echo e(__('adminBody.Account_Owner')); ?></th>
                                    <th><?php echo e(__('adminBody.Notes')); ?></th>
                                    <th><?php echo e(__('adminBody.Amount')); ?></th>
                                    <th><?php echo e(__('adminBody.Product_Name')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <tr>
                                    <td>#<?php echo e($transaction->order_id); ?></td>

                                    <td>#<?php echo e($transaction->uuid); ?></td>

                                    <td><?php echo e($transaction->created_at); ?></td>

                                    <td><?php echo e($transaction->type); ?></td>

                                    <td><?php echo e($transaction->wallet ? $transaction->wallet->accountable->first_name : $transaction->wallet->accountable->name); ?></td>

                                    <td><?php echo e($transaction->notes); ?></td>

                                    <td><?php echo e($transaction->amount); ?></td>
                                    <?php if($transaction->product_id == null): ?>
                                    <td><?php echo e(__('Not product related transaction')); ?></td>
                                    
                                    <?php else: ?>
                                        
                                    <td><?php echo e($transaction->product->name); ?></td>
                                    <?php endif; ?>
                                </tr>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <?php echo $transactions->links(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/accounting/transactions.blade.php ENDPATH**/ ?>