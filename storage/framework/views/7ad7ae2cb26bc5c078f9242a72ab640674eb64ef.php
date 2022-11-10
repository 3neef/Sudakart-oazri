
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', __('adminNav.upselling')); ?>
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
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-upselling')): ?>
                    <a href="<?php echo e(route('admin.upselling.create')); ?>" class="btn btn-primary mt-md-0 mt-2"><?php echo e(__('adminBody.New_upselling')); ?></a>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi">
                            <table class="all-package coupon-table table table-striped">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('adminBody.UP_Title')); ?></th>
                                    
                                        <th><?php echo e(__('adminBody.Products_Count')); ?></th>
                                        <th><?php echo e(__('adminBody.Create_Date')); ?></th>
                                        <th><?php echo e(__('adminBody.Actions')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $upsells; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upsell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-row-id="1">
                                        <td><?php echo e($upsell->discount *100); ?>% Off</td>

                                    

                                        <td><?php echo e($upsell->products->count()); ?></td>

                                        <td><?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($upsell->created_at))->format('d-m-Y')); ?></td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-upselling')): ?>
                                        <td>
                                            <form action="<?php echo e(route('admin.offers.destroy', $upsell->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                        <?php endif; ?>
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
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/promotions/upselling/index.blade.php ENDPATH**/ ?>