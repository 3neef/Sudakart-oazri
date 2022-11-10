
<?php $__env->startSection('title', 'Products Reviews'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    
                </div>
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi">
                            <table class="review-table table all-package">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('adminBody.no')); ?></th>
                                        <th><?php echo e(__('adminBody.customer_name')); ?></th>
                                        <th><?php echo e(__('adminBody.Product_Name')); ?></th>
                                        <th><?php echo e(__('adminBody.rating')); ?></th>
                                        <th><?php echo e(__('adminBody.comment')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($rate->id); ?></td>
                                            <td><?php if($rate->customer): ?><?php echo e($rate->customer->name); ?><?php endif; ?></td>
                                            <td><?php echo e($rate->product->en_name); ?></td>
                                            <td>
                                                <ul class="rating">
                                                <?php for($i = 1; $i <= $rate->rate; $i++): ?>
                                                    
                                                <li>
                                                    <i class="fa fa-star theme-color"></i>
                                                </li>
                                                <?php endfor; ?>
                                                <?php for($i = 1; $i <= 5-$rate->rate; $i++): ?>
                                                    
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <?php endfor; ?>

                                                </ul>
                                            </td>
                                            <td><?php echo e($rate->comment); ?></td>
                                        </tr>
                                
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <div class="d-flex justify-content-center">
                                    <?php echo $rates->links(); ?>

                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/products/rates.blade.php ENDPATH**/ ?>