
<?php $__env->startSection('title', __('body.update_vendor')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title=""><?php echo e(__('body.update_vendor')); ?></a></li>
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
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form class="needs-validation user-add" action="<?php echo e(route('admin.vendors.update', $vendor->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <h4><?php echo e(__('body.Details')); ?></h4>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('form.f_name')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="first_name" type="text" value="<?php echo e($vendor->first_name); ?>"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('form.l_name')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="last_name" type="text" value="<?php echo e($vendor->last_name); ?>"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('form.phone_number')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="phone" type="number" value="<?php echo e($vendor->user->phone); ?>"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('body.email')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="email" type="email" value="<?php echo e($vendor->user->email); ?>"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('body.Second_Phone')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="secondary_phone" type="number" value="<?php echo e($vendor->secondary_phone); ?>"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('form.bank_name')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="bank_name" type="text" value="<?php echo e($vendor->bank_name); ?>"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('form.account_number')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="account_number" type="text" value="<?php echo e($vendor->account_number); ?>"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('form.account_name')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="account_holder_name" type="text" value="<?php echo e($vendor->account_holder_name); ?>"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('form.branch')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="branch" type="text" value="<?php echo e($vendor->branch); ?>"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('form.shop_name')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="shop_name" type="text" value="<?php echo e($vendor->shop->shop_name); ?>"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('form.shop_en_name')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="shop_en_name" type="text" value="<?php echo e($vendor->shop->shop_en_name); ?>"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('form.shop_address')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="shop_address" type="text" value="<?php echo e($vendor->shop->shop_Address); ?>"
                                            required="">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('form.shop_categories')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <select class="js-example-basic-multiple form-control <?php echo e($errors->has('category') ? 'is-invalid' : ''); ?>" name="shop_categories[][category_id]" multiple="multiple">
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option data-badge="" value="<?php echo e($id); ?>" <?php echo e(old('shop_categories[]') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('adminBody.save')); ?></button>
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/panel/vendors/edit.blade.php ENDPATH**/ ?>