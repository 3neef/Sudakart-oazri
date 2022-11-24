
<?php $__env->startSection('title', __('adminBody.new_coupon')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title=""><?php echo e(__('adminBody.new_coupon')); ?></a></li>
                    </ul>
                    <?php if($errors->count() > 0): ?>
                    <?php echo e($errors); ?>

                        
                    <?php endif; ?>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="POST" action="<?php echo e(route('admin.coupons.store')); ?>" class="needs-validation user-add">
                                <?php echo csrf_field(); ?>
                                <h4><?php echo e(__('adminBody.new_coupon')); ?></h4>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('adminBody.Code')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="code" name="code" type="text"
                                            required="">
                                    </div>
                                    <?php if($errors->has('code')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('code')); ?>

                                    </div>
                                <?php endif; ?>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span> <?php echo e(__('adminBody.Discount')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="discount" name="discount" type="number"
                                        step="0.01"
                                            required="">
                                    </div>
                                     <?php if($errors->has('discount')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('discount')); ?>

                                    </div>
                                <?php endif; ?>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('adminBody.Expire_Date')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="expire_at" name="expire_at" type="date"
                                            required="">
                                    </div>
                                     <?php if($errors->has('expire_at')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('expire_at')); ?>

                                    </div>
                                <?php endif; ?>
                                </div>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary" value="<?php echo e(__('adminBody.save')); ?>"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/promotions/coupons/create.blade.php ENDPATH**/ ?>