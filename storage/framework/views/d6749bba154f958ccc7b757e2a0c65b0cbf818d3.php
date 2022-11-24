
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', __('adminBody.update_region')); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title=""><?php echo e(__('adminBody.update_region')); ?></a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="POST" action="<?php echo e(route('admin.region.update', $region->id)); ?>" class="needs-validation user-add">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <h4><?php echo e(__('adminBody.update_region')); ?></h4>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('body.name')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="region" name="region" type="text" value="<?php echo e($region->region); ?>"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('body.delivary_price')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="region_delivery_fee" name="region_delivery_fee" type="number" value="<?php echo e($region->region_delivery_fee); ?>"
                                            required="">
                                    </div>
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/settings/regions/edit.blade.php ENDPATH**/ ?>