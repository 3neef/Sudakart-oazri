
<?php $__env->startSection('title', __('adminBody.WALLETS_LIST')); ?>
<?php if(Auth::user()->userable_type == 'App\Models\Vendor'): ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="bg-inner cart-section order-details-table">
                        <div class="row g-4">
                            <div class="col-max">
                                <div class="card-details-title">
                                    <h3><?php echo e(__('adminBody.Your_Wallet_Balance_is')); ?>    <span><?php echo e($wallets->total_balance); ?> OMR</span></h3>
                                </div>
                                <div class="table-responsive table-desi">
                                    <table class="table trans-table all-package">
                                        <thead>
                                            <tr>
                                                <th><?php echo e(__('adminBody.Order_Id')); ?></th>
                                                <th><?php echo e(__('adminBody.Transaction_Id')); ?></th>
                                                <th><?php echo e(__('adminBody.date')); ?></th>
                                                <th><?php echo e(__('adminBody.Type')); ?></th>
                                                <th><?php echo e(__('adminBody.Wallet_Id')); ?></th>
                                                <th><?php echo e(__('adminBody.Notes')); ?></th>
                                                <th><?php echo e(__('adminBody.Amount')); ?></th>
                                                <th><?php echo e(__('adminBody.Product_Id')); ?></th>
                                            </tr>
                                        </thead>
            
                                        <tbody>
                                            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <tr>
                                                <td><?php echo e($transaction->id); ?></td>
            
                                                <td>#<?php echo e($transaction->uuid); ?></td>
            
                                                <td><?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($transaction->created_at))->format('d-m-Y')); ?></td>
            
                                                <td><?php echo e($transaction->type); ?></td>
            
                                                <td><?php echo e($transaction->wallet_id); ?></td>
            
                                                <td><?php echo e($transaction->notes); ?></td>
            
                                                <td><?php echo e($transaction->amount); ?></td>
                                                <?php if($transaction->product_id == null): ?>
                                                <td><?php echo e(__('Order related transaction')); ?></td>
                                                
                                                <?php else: ?>
                                                    
                                                <td><?php echo e($transaction->product->name); ?></td>
                                                <?php endif; ?>
                                            </tr>
                                                
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- section end -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
    
<?php else: ?>
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
                                    <th><?php echo e(__('adminBody.Wallet_Id')); ?></th>
                                    <th><?php echo e(__('adminBody.Account_Owner')); ?></th>
                                    <th><?php echo e(__('adminBody.Balance')); ?></th>
                                    <th><?php echo e(__('adminBody.date')); ?></th>
                                    <th><?php echo e(__('adminBody.Actions')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $wallets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wallet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($wallet->id); ?></td>

                                    <td><?php echo e($wallet->accountable ? $wallet->accountable->first_name : 'invalid name'); ?></td>

                                    <td><?php echo e($wallet->balance); ?>  OMR</td>

                                    <td><?php echo e($wallet->created_at); ?></td>
                                    
                                    <td>
                                        <a href="<?php echo e(route('admin.accounting.wallets.operation', $wallet->id)); ?>">
                                            <i class="fa fa-edit fa-2x" title="operations"></i>
                                        </a>
                                        <a href="<?php echo e(route('admin.accounting.wallets.history', $wallet->id)); ?>">
                                            <i class="fa fa-history fa-2x" title="history"></i>
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
<?php endif; ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/accounting/wallets.blade.php ENDPATH**/ ?>