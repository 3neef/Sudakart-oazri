
<?php $__env->startSection('title', 'Expenses Reports'); ?>
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
                            <form method="GET" action="<?php echo e(route('admin.expenses-report.request')); ?>" class="needs-validation user-add">
                                <h4>find expenses</h4>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span>Expenses Types</label>
                                    <div class="col-md-7">
                                        <div class="button-container" style=" margin-bottom: 10px;">
                                            <button type="button" onclick="selectAll()">Select All</button>
                                            <button type="button" onclick="deselectAll()">Deselect All</button>
                                        </div>
                                        <select class="js-example-basic-multiple form-control" name="types[]" multiple="multiple">
                                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($id); ?>" <?php echo e(old('type_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
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
                        <h3>Your Total Expenses is <span><?php echo e($expenses->sum('price')); ?> OMR</span></h3>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="all-package coupon-table table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Receipt</th>
                                    <th>Created On</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-row-id="<?php echo e($expense->id); ?>">
                                    <td><?php echo e($expense->expense_type->name); ?></td>

                                    <td >
                                        <span><?php echo e($expense->price); ?></span>
                                    </td>

                                    <td>
                                        
                                        <img src="<?php echo e(asset($expense->image)); ?>"
                                            data-field="image" alt="
                                            ">
                                    
                                    </td>

                                    <td class="list-date"><?php echo e($expense->expense_date); ?></td>

                                    <td>
                                        <a href="<?php echo e(route('admin.accounting.expenses.edit', $expense->id)); ?>">
                                            <i class="fa fa-edit" title="Edit"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.accounting.expenses.destroy', $expense->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash"></i></button>
                                        </form>
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/reports/expenses/index.blade.php ENDPATH**/ ?>