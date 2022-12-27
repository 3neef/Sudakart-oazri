
<?php $__env->startSection('title', __('body.create_account')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title=""><?php echo e(__('body.create_account')); ?></a></li>
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
                            <form class="needs-validation user-add" action="<?php echo e(route('admin.driver-create.store')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <h4><?php echo e(__('body.Details')); ?></h4>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('body.name')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="name" type="text"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('form.phone_number')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="phone" type="number"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('body.email')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="email" type="email"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('form.second_email')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="secondary_email" type="email"
                                            >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('body.Second_Phone')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="secondary_phone" type="number"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('body.address')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="address" type="text"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom02" class="col-xl-3 col-md-4"><span></span>
                                        <?php echo e(__('Image')); ?></label>
                                        <div class="col-xl-8 col-md-7">
                                        <input class="form-control" type="file" id="formFileMultiple" name="image"/>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom02" class="col-xl-3 col-md-4"><span></span>
                                        <?php echo e(__('Identity')); ?></label>
                                        <div class="col-xl-8 col-md-7">
                                        <input class="form-control" type="file" id="formFileMultiple" name="identity"/>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('vichel')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <select class="custom-select form-control <?php echo e($errors->has('vichel') ? 'is-invalid' : ''); ?>" name="vichel" id="vichel" required>
                                            <option value="">choose</option>
                                            <?php $__currentLoopData = $vichels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vichel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($vichel); ?>"><?php echo e($vichel); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom3"
                                        class="col-xl-3 col-md-4"><span>*</span> <?php echo e(__('body.password')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="password"
                                            type="password" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom4"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('body.Confirm_Password')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="password_confirmation"
                                            type="password" required="">
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/panel/drivers/create.blade.php ENDPATH**/ ?>