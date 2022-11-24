
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', __('adminBody.NEW_Category')); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title=""><?php echo e(__('adminBody.NEW_Category')); ?></a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="POST" action="<?php echo e(route('admin.categories.store')); ?>" class="needs-validation user-add" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <h4><?php echo e(__('adminBody.NEW_Category')); ?></h4>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('body.name')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="name" name="name" type="text"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span> <?php echo e(__('form.en_name')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="en_name" name="en_name" type="text"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span> <?php echo e(__('body.commission')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="commission" name="commission" type="number"
                                           step="0.01" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom3"
                                        class="col-xl-3 col-md-4"><span>*</span> <?php echo e(__('body.color')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="color" name="color"
                                            type="color">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="receipt" class="form-label"><?php echo e(__('adminBody.Image')); ?></label>
                                    <input class="form-control" type="file" id="image" name="image">
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/settings/categories/create.blade.php ENDPATH**/ ?>