
<?php $__env->startSection('title', __('adminNav.commissions')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title=""><?php echo e(__('adminNav.comm_report')); ?></a></li>
                    </ul>
                    <?php if($errors->count() > 0): ?>
                    <?php echo e($errors); ?>

                        
                    <?php endif; ?>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="GET" action="<?php echo e(route('admin.commissions-report.request')); ?>" class="needs-validation user-add">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('adminBody.Vendors')); ?></label>
                                    <div class="col-md-7">
                                        <div class="button-container" style=" margin-bottom: 10px;">
                                            <button type="button" onclick="selectAll()"><?php echo e(__('adminBody.Select_All')); ?></button>
                                            <button type="button" onclick="deselectAll()"><?php echo e(__('adminBody.Deselect_All')); ?></button>
                                        </div>
                                        <select class="js-example-basic-multiple form-control" name="vendors[]" multiple="multiple">
                                            <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($id); ?>" <?php echo e(old('vendor_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('adminBody.from')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="date_from" name="date_from" type="date"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('adminBody.to')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="date_to" name="date_to" type="date"
                                            required="">
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary" value="<?php echo e(__('body.Choose')); ?>"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-details-title">
                        <h3><?php echo e(__('adminBody.total_comm')); ?> <span><?php echo money($transactions->sum('amount') ,'OMR'); ?></span></h3>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table trans-table all-package">
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
    
                                        <td><?php echo e($transaction->wallet ? $transaction->wallet->accountable->first_name : $transaction->wallet->accountable->name); ?></td>
    
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
                    <?php echo $transactions->withQueryString()->links(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/reports/commissions/index.blade.php ENDPATH**/ ?>