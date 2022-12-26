
<?php $__env->startSection('title', __('adminNav.Logs')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="bg-inner cart-section order-details-table">
                        <div class="row g-4">
                            <div class="col-xl-12">
                                <div class="card-details-title">
                                    <h3><span><?php echo e($activity->description); ?></span></h3>
                                </div>
                                <div class="table-responsive table-desi">
                                    <?php $__currentLoopData = $activity->properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                    <table class="table all-package table-category mt-5">
                                        <thead>
                                            <?php if($loop->index == 0): ?> 
                                            <tr>
                                                <div style="font-size: 1.5em; font-weight: bold; " class="d-flex justify-content-center mt-3">NEW</div>
                                            </tr>
                                            <?php elseif($loop->index == 1): ?>
                                            <tr>
                                                <div style="font-size: 1.5em; font-weight: bold; " class="d-flex justify-content-center mt-3">OLD</div>
                                            </tr>
                                            <?php endif; ?>
                                            <tr>
                                                <?php $__currentLoopData = $property; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                <th ><?php echo e($key); ?></th>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php $__currentLoopData = $property; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                <td ><?php echo e($value); ?></td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section end -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/panel/settings/activities/show.blade.php ENDPATH**/ ?>