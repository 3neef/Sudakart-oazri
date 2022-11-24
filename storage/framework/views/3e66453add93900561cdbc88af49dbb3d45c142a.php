
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', __('adminBody.offers_list')); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-offer')): ?>
                        <a href="<?php echo e(route('admin.offers.create')); ?>" class="btn btn-primary mt-md-0 mt-2"><?php echo e(__('adminBody.New_Offer')); ?></a>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi">
                            <table class="all-package coupon-table table table-striped">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('body.name')); ?></th>
                                        <th><?php echo e(__('form.en_name')); ?></th>
                                        <th><?php echo e(__('adminBody.Discount')); ?></th>
                                        <th><?php echo e(__('adminBody.Created_On')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-row-id="<?php echo e($offer->id); ?>">
                                        <td><?php echo e($offer->name); ?></td>

                                        <td><?php echo e($offer->en_name); ?></td>

                                        <td><?php echo e($offer->discount); ?></td>

                                        <td>
                                            <?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($offer->expire_at))->format('d-m-Y')); ?>

                                        </td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-offer')): ?>
                                        <td>
                                            <form action="<?php echo e(route('admin.offers.destroy', $offer->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash" title="<?php echo e(__('body.delete')); ?>"></i></button>
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/promotions/offers/index.blade.php ENDPATH**/ ?>