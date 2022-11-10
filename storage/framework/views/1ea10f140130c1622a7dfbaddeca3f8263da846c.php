
<?php $__env->startSection('title', 'Create a new Expense'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card tab2-card">
        <div class="card-body">
            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active show" id="restriction-tabs" data-bs-toggle="tab"
                        href="#restriction" role="tab" aria-controls="restriction" aria-selected="false"
                        data-original-title="" title="">Add an Expense</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="restriction" role="tabpanel"
                    aria-labelledby="restriction-tabs">
                    <form method="POST" action="<?php echo e(route('admin.accounting.expenses.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label class="col-xl-3 col-md-4">Expense Type</label>
                            <div class="col-md-7">
                                <select class="custom-select w-100 form-control" name="expense_type_id" id="expense_type_id" required="">
                                    <option value="">--Select--</option>
                                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>"><?php echo e($entry); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="validationCustom4" class="col-xl-3 col-md-4">Price</label>
                            <div class="col-md-7">
                                <input class="form-control" name="price" id="price" type="number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="expense_date" class="col-xl-3 col-md-4">Date</label>
                            <div class="col-md-7">
                                <input class="form-control" name="expense_date" id="expense_date" type="datetime-local">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="receipt" class="form-label">Receipt</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
                        <div class="form-group row">
                            <input type="submit" class="btn btn-primary"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/accounting/expenses/create.blade.php ENDPATH**/ ?>