
<?php $__env->startSection('title', 'Profit-Loss Report'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">Years</a></li>
                    </ul>
                    <?php if($errors->count() > 0): ?>
                    <?php echo e($errors); ?>

                        
                    <?php endif; ?>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="POST" action="<?php echo e(route('admin.profit-report.year')); ?>" class="needs-validation user-add">
                                <?php echo csrf_field(); ?>
                                <h4>yearly profits</h4>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span>Select A Year</label>
                                    <div class="col-md-7">
                                        <select class="js-example-basic-multiple form-control" name="year">
                                            <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($entry); ?>"><?php echo e($entry); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
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
                <?php if($year): ?>
                <div class="card-header">
                    <div class="card-details-title">
                        <h3>Showing profits from the year <span><?php echo e($year); ?></span></h3>
                    </div>
                </div>
                <?php endif; ?>
                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="all-package coupon-table table table-striped">
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>Expenses</th>
                                    <th>Commissions</th>
                                    <th>Profit/ Loss</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $monthes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($month); ?></td>
                                    <td><?php echo e($expenses->where('month', $month)->first() ? $expenses->where('month', $month)->first()->total_expenses : 0); ?></td>
                                    <td><?php echo e($commissions->where('month', $month)->first() ? $commissions->where('month', $month)->first()->total_commissions : 0); ?></td>
                                    <td><?php echo e(($commissions->where('month', $month)->first() ? $commissions->where('month', $month)->first()->total_commissions : 0) - ($expenses->where('month', $month)->first() ? $expenses->where('month', $month)->first()->total_expenses : 0)); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>Total</td>
                                    <td><?php echo e($expenses->sum('total_expenses')); ?></td>
                                    <td><?php echo e($commissions->sum('total_commissions')); ?></td>
                                    <td><?php echo e($commissions->sum('total_commissions') - $expenses->sum('total_expenses')); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/reports/profit/index.blade.php ENDPATH**/ ?>