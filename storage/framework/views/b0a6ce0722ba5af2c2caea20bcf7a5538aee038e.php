
<?php $__env->startSection('title', __('Users Logins')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title=""><?php echo e(__('Users Logins')); ?></a></li>
                    </ul>
                    <?php if($errors->count() > 0): ?>
                    <?php echo e($errors); ?>

                        
                    <?php endif; ?>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="GET" action="<?php echo e(route('admin.user-login.request')); ?>" class="needs-validation user-add">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('User Type')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <select class="custom-select w-100 form-control" name="userable_type" >
                                            <option value=""><?php echo e(__('body.Choose')); ?></option>
                                            <option value="App\Models\Vendor"><?php echo e(__('adminBody.Vendors')); ?></option>
                                            <option value="App\Models\Customer"><?php echo e(__('adminNav.customers')); ?></option>
                                            <option value="App\Models\Driver"><?php echo e(__('adminBody.dirvers')); ?></option>
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
                                        class="col-xl-3 col-md-4"><span> </span> <?php echo e(__('adminBody.to')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="date_to" name="date_to" type="date"
                                            >
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/panel/settings/logins/request.blade.php ENDPATH**/ ?>