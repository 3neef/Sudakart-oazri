
<?php $__env->startSection('title', 'Create Admin'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">Account</a></li>
                    </ul>
                    <?php if($errors->count() > 0): ?>
                        <?php echo e($errors); ?>

                    <?php endif; ?>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form class="needs-validation user-add" action="<?php echo e(route('admin.admin-create.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <h4>Account Details</h4>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span>Name</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="name" type="text"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span>Phone</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="phone" type="number"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>Email</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="email" type="email"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>Secondary Email</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="secondary_email" type="email"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>Secondary Phone</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="secondary_phone" type="number"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>Address</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="address" type="text"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2"
                                        class="col-xl-3 col-md-4"><span>*</span>Role</label>
                                    <div class="col-xl-8 col-md-7">
                                        <select class="custom-select form-control <?php echo e($errors->has('category') ? 'is-invalid' : ''); ?>" name="role" id="role" required>
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($role); ?>"><?php echo e($role); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom3"
                                        class="col-xl-3 col-md-4"><span>*</span> Password</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="password"
                                            type="password" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom4"
                                        class="col-xl-3 col-md-4"><span>*</span> Confirm
                                        Password</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" name="password_confirmation"
                                            type="password" required="">
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">save</button>
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/admin/users/create.blade.php ENDPATH**/ ?>