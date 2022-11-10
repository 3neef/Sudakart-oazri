
<?php $__env->startSection('title', 'Attribute'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="bg-inner cart-section order-details-table">
                        <div class="row g-4">
                            <div class="col-xl-8">
                                <div class="card-details-title">
                                    <h3>Attribute<span> <?php echo e($attribute->name); ?></span></h3>
                                </div>
                                <div class="table-responsive table-details">
                                    <table class="table cart-table table-borderless">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Options</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $__currentLoopData = $attribute->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="table-order">
                                                <td>
                                                    <p>Attribute Ref.</p>
                                                    <h5>##<?php echo e($option->attribute->id); ?></h5>
                                                </td>
                                                <td>
                                                    <p>Option Name</p>
                                                    <h5><?php echo e($option->option); ?></h5>
                                                </td>
                                                <td>
                                                    <p>Option English Name</p>
                                                    <h5><?php echo e($option->en_option); ?></h5>
                                                </td>
                                            </tr>
                                                
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/settings/attributes/show.blade.php ENDPATH**/ ?>