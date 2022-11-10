
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', __('adminBody.Coupons_List')); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-inline search-form search-box">
                        <div class="form-group">
                            <input class="form-control-plaintext" type="search" placeholder="Search..">
                        </div>
                    </form>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-coupon')): ?>
                    <a href="<?php echo e(route('admin.coupons.create')); ?>" class="btn btn-primary mt-md-0 mt-2">
                        <?php echo e(__('adminBody.new_Coupons')); ?>

                    </a>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi">
                            <table class="all-package coupon-table table table-striped">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('adminBody.Shop_Ref')); ?></th>
                                        <th><?php echo e(__('adminBody.Code')); ?></th>
                                        <th><?php echo e(__('adminBody.Discount')); ?></th>
                                        <th><?php echo e(__('adminBody.Expire_Date')); ?></th>
                                        <th><?php echo e(__('adminBody.stoped')); ?></th>
                                        <th><?php echo e(__('adminBody.Actions')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-row-id="1">
                                        <td>##<?php echo e($coupon->shop_id); ?></td>

                                        <td><?php echo e($coupon->code); ?></td>

                                        <td><?php echo e($coupon->discount); ?></td>

                                        <td>
                                            <?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($coupon->expire_at))->format('d-m-Y')); ?>

                                        </td>
                                        <?php if($coupon->stop == true): ?>
                                        <td class="td-check">
                                            <i data-feather="check-circle"></i>
                                        </td>
                                            
                                        <?php else: ?>
                                            
                                        <td class="td-cross">
                                            <i data-feather="x-circle"></i>
                                        </td>
                                        <?php endif; ?>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stop-coupon')): ?>
                                                
                                            <form action="<?php echo e(route('admin.coupons.update', $coupon->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('Put'); ?>
                                                <input type="number" value="1" name="stop" hidden>
                                                <button type="submit" style="border:none"><i class="fa fa-stop"></i></button>
                                            </form>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-coupon')): ?>
                                            <form action="<?php echo e(route('admin.coupons.destroy', $coupon->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash"></i></button>
                                            </form>
                                                
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php echo $coupons->links(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/promotions/coupons/index.blade.php ENDPATH**/ ?>