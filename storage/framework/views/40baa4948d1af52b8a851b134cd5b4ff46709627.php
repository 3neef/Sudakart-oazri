
<?php $__env->startSection('title', __('form.add_expense_type')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card tab2-card">
        <div class="card-body">
            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active show" id="restriction-tabs" data-bs-toggle="tab"
                        href="#restriction" role="tab" aria-controls="restriction" aria-selected="false"
                        data-original-title="" title=""><?php echo e(__('form.add_expense_type')); ?></a></li>
            </ul>
                <?php if($errors->any()): ?>
                <section class="col-lg-12">
                
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="alert alert-danger d-flex justify-content-between align-items-center">
                            <?php echo e($error); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </section>
                <?php endif; ?>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="restriction" role="tabpanel"
                    aria-labelledby="restriction-tabs">
                    <form method="POST" action="<?php echo e(route('admin.accounting.expensetypes.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="validationCustom4" class="col-xl-3 col-md-4"><?php echo e(__('body.name')); ?></label>
                            <div class="col-md-7">
                                <input class="form-control" name="name" id="name" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="submit" class="btn btn-primary" value="<?php echo e(__('adminBody.save')); ?>"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/accounting/expenses/typecreate.blade.php ENDPATH**/ ?>