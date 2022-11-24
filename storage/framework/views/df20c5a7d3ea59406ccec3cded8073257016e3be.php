
<?php $__env->startSection('title', __('adminBody.Advertisements_list')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid bulk-cate">

    <div class="card">
        <div class="card-header">
            <a href="<?php echo e(route('admin.ads.create')); ?>" class="btn btn-primary mt-md-0 mt-2"><?php echo e(__('adminBody.new_ad')); ?></a>
        </div>

        <div class="card-body">
            <div class="table-responsive table-desi">
                <table class="all-package coupon-table table table-striped">
                    <thead>
                        <tr>
                            <th><?php echo e(__('adminBody.Image')); ?></th>
                            <th><?php echo e(__('adminBody.Product_Name')); ?></th>
                            <th><?php echo e(__('adminBody.Actions')); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                        <tr data-row-id="1">
                            <td>
                                <img src="<?php echo e(asset($ad->image)); ?>" alt="user">
                            </td>
                            
                            <td><?php if($ad->product): ?><?php echo e($ad->product->en_name); ?><?php endif; ?></td>
                            
                            <td>
                                <form action="<?php echo e(route('admin.ads.destroy', $ad->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <?php echo e($ads->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/promotions/ads/index.blade.php ENDPATH**/ ?>