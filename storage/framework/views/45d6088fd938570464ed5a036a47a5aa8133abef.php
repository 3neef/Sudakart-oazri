
<?php $__env->startSection('title', __('adminBody.TRANSACTIONS_LIST')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                </div>
                
                <div class="card-body">
                    <div class="card-details-title">
                        <h3><?php echo e(__('body.wallet_records')); ?> <span><?php echo e($transactions->first()->wallet ? $transactions->first()->wallet->accountable->first_name : $transactions->first()->wallet->accountable->name); ?></span></h3>
                    </div>
                   <div class="card-body order-datatable">
                    <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('adminBody.Order_Id')); ?></th>
                                    <th><?php echo e(__('adminBody.Transaction_Id')); ?></th>
                                    <th><?php echo e(__('adminBody.date')); ?></th>
                                    <th><?php echo e(__('adminBody.Type')); ?></th>
                                    <th><?php echo e(__('adminBody.Notes')); ?></th>
                                    <th><?php echo e(__('adminBody.Amount')); ?></th>
                                    <th><?php echo e(__('adminBody.Product_Id')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <tr>
                                    <td>#<?php echo e($transaction->order_id); ?></td>

                                    <td>tran_<?php echo e(base_convert(md5($transaction->uuid), 2, 8)); ?></td>

                                    <td><?php echo e($transaction->created_at); ?></td>

                                    <td>
                                        <span
                                            class=" badge
                                            <?php if($transaction->type == 'refund'): ?>
                                                badge-danger
                                            <?php elseif($transaction->type == 'payment'): ?>
                                                badge-info
                                            <?php elseif($transaction->type == 'deposit'): ?>
                                                badge-success
                                            <?php elseif($transaction->type == 'withdraw'): ?>
                                                badge-primary
                                            <?php endif; ?>
                                                ">
                                                <?php if($transaction->type == 'refund' ): ?>
                                                <?php echo e(__('body.refund')); ?>

                                                <?php elseif($transaction->type == 'payment'): ?>
                                                <?php echo e(__('body.payment')); ?>

                                                <?php elseif($transaction->type == 'deposit'): ?>
                                                <?php echo e(__('body.deposit')); ?>

                                                <?php elseif($transaction->type == 'withdraw'): ?>
                                                <?php echo e(__('body.withdraw')); ?>

                                                <?php endif; ?>
                                        </span>
                                    </td>

                                    <td><?php echo e($transaction->notes); ?></td>

                                    <td><?php echo money($transaction->amount, 'OMR'); ?></td>
                                    <?php if($transaction->product_id == null): ?>
                                    <?php if(app()->getLocale() == 'en'): ?>
                                    <td><?php echo e(__('Not product related transaction')); ?></td>
                                    <?php else: ?>
                                    <td><?php echo e(__('التحويلة عير مرتبطة بمنتج')); ?></td>
                                    <?php endif; ?>
                                    
                                    
                                    <?php else: ?>
                                    <?php if(app()->getLocale() == 'en'): ?>
                                    <td><?php echo e($transaction->product->en_name); ?></td>
                                    <?php else: ?>
                                    <td><?php echo e($transaction->product->name); ?></td>
                                    <?php endif; ?>
                                    
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/wallets/history.blade.php ENDPATH**/ ?>