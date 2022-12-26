
<?php $__env->startSection('title', __('adminNav.expenses_report')); ?>
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
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-details-title">
                        <h3>Total Users are <span><?php echo e($users->count()); ?></span> in the selected period</h3>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="all-package coupon-table table table-striped">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('ID')); ?></th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Phone')); ?></th>
                                    <th><?php echo e(__('Email')); ?></th>
                                    <th><?php echo e(__('User Type')); ?></th>
                                    <th><?php echo e(__('Last Login')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-row-id="<?php echo e($user->id); ?>">
                                    <td><?php echo e($loop->index + 1); ?></td>

                                    <td><?php echo e($user->userable ? $user->userable->name : $user->userable->first_name); ?></td>

                                    <td >
                                        <span><?php echo e($user->phone); ?></span>
                                    </td>

                                    <td>
                                        <?php echo e($user ? $user->email : ''); ?>

                                    </td>

                                    <td>
                                        <?php echo e($user->userable_type); ?>

                                    </td>

                                    <td class="list-date"><?php echo e($user->login_date); ?></td>
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/panel/settings/logins/index.blade.php ENDPATH**/ ?>