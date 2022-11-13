
<?php $__env->startSection('content'); ?>
 <!-- breadcrumb start -->
 <div class="breadcrumb-section bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2><?php echo e(__('body.return_orders')); ?></h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><?php echo e(__('body.home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('body.return_orders')); ?></li>
                    </ol>
                </nav>
            </div>
            <?php echo $__env->make('main/partials/profile-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-md-9">
                
                <section class="section-b-space pt-0 ratio_asos">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-12">
                           <div class="card">
                                <div class="card-header">
                                    <div class="header-title"><h4><?php echo e(__('body.return_orders')); ?></h4></div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-hovered">
                                        <thead>
                                            <th>#<?php echo e(__('body.refrence_number')); ?></th>
                                            <th><?php echo e(__('body.date')); ?></th>
                                            <th><?php echo e(__('body.product')); ?></th>
                                            <th><?php echo e(__('body.reason')); ?></th>
                                            <th><?php echo e(__('body.status')); ?></th>
                                            
                                        </thead>
                                        <tbody>
                                            
                                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($order->id); ?></td>
                                                <td><?php echo e($order->created_at); ?></td>
                                                <td><?php echo e($order->en_name); ?></td>
                                                <td><?php echo e($order->reason); ?></td>
                                                <td><?php echo e($order->status); ?></td>
                                                
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    </div>
                                   
                                </div>
                                <div class="card-footer">
                                    <?php echo e($orders->links()); ?>

                                </div>
                           </div>
                        </div>
                      </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sudakart\resources\views/main/profile/refund.blade.php ENDPATH**/ ?>