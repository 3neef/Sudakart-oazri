
<?php $__env->startSection('title', 'Commissions List'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">New</a></li>
                    </ul>
                    <?php if($errors->count() > 0): ?>
                    <?php echo e($errors); ?>

                        
                    <?php endif; ?>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="GET" action="<?php echo e(route('admin.commissions-report.request')); ?>" class="needs-validation user-add">
                                <h4>find sales</h4>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span>Vendors</label>
                                    <div class="col-md-7">
                                        <div class="button-container" style=" margin-bottom: 10px;">
                                            <button type="button" onclick="selectAll()">Select All</button>
                                            <button type="button" onclick="deselectAll()">Deselect All</button>
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
                                        class="col-xl-3 col-md-4"><span>*</span>From</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="date_from" name="date_from" type="date"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span>To</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="date_to" name="date_to" type="date"
                                            required="">
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary"></input>
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
                        <h3>Your Total Commissions is <span><?php echo e($transactions->sum('amount')); ?> OMR</span></h3>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table trans-table all-package">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Transaction Id</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Wallet Id</th>
                                    <th>Notes</th>
                                    <th>Amount</th>
                                    <th>Product Id</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <tr>
                                    <td><?php echo e($transaction->order_id); ?></td>

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
                <div class="d-flex justify-content-center">
                    <?php echo $transactions->withQueryString()->links(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/reports/commissions/index.blade.php ENDPATH**/ ?>