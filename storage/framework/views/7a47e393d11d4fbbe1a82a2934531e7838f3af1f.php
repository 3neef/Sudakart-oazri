
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

                    <?php if(auth()->user()->userable_type == 'App\Models\Vendor'): ?>
                    <a href="<?php echo e(route('admin.coupons.create')); ?>" class="btn btn-primary mt-md-0 mt-2">
                        <?php echo e(__('adminBody.new_coupon')); ?>

                    </a>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi">
                            <table class="all-package coupon-table table table-striped">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('adminBody.shop_name')); ?></th>
                                        <th><?php echo e(__('adminBody.Code')); ?></th>
                                        <th><?php echo e(__('adminBody.Discount')); ?></th>
                                        <th><?php echo e(__('adminBody.Expire_Date')); ?></th>
                                        <th><?php echo e(__('adminBody.stoped')); ?></th>
                                        <?php if(auth()->user()->userable_type == 'App\Models\Vendor'): ?>
                                            
                                        <th><?php echo e(__('adminBody.Actions')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-row-id="1">
                                        <?php if(app()->getLocale() == 'en'): ?>
                                        <td data-field="name"><?php echo e($coupon->shop ? $coupon->shop->shop_en_name : 'oazri'); ?></td>
                                        
                                        <?php else: ?>
                                        <td data-field="name"><?php echo e($coupon->shop ? $coupon->shop->shop_name : 'العزري'); ?></td>
                                            
                                        <?php endif; ?>

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
                                        <?php if(auth()->user()->userable_type == 'App\Models\Vendor'): ?>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stop-coupon')): ?>
                                            
                                            <form action="<?php echo e(route('admin.coupons.update', $coupon->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('Put'); ?>
                                                <input type="number" value="1" name="stop" hidden>
                                                <button type="submit" style="border:none"><i class="fa fa-stop" title="<?php echo e(__('body.stop')); ?>"></i></button>
                                            </form>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-coupon')): ?>
                                            <form action="<?php echo e(route('admin.coupons.destroy', $coupon->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash" title="<?php echo e(__('body.delete')); ?>"></i></button>
                                            </form>
                                            
                                            <?php endif; ?>
                                        </td>
                                        <?php endif; ?>
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/promotions/coupons/index.blade.php ENDPATH**/ ?>