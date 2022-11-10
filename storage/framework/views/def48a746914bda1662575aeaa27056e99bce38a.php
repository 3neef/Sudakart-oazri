
<?php $__env->startSection('content'); ?>
 <!-- breadcrumb start -->
 <div class="breadcrumb-section bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2><?php echo e(__('body.order_history')); ?></h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><?php echo e(__('body.home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('body.order_history')); ?></li>
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
                                    <div class="header-title">
                                        <h4><?php echo e(__('body.order_history')); ?></h4>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-hovered">
                                        <thead>
                                           
                                            <th>#<?php echo e(__('body.refrence_number')); ?></th>
                                            <th><?php echo e(__('body.date')); ?></th>
                                            <th><?php echo e(__('body.products')); ?></th>
                                            <th><?php echo e(__('body.total')); ?></th>
                                            <th><?php echo e(__('body.delivary_price')); ?></th>
                                            <th><?php echo e(__('body.payment_status')); ?></th>
                                            <th><?php echo e(__('adminBody.Actions')); ?></th>
                                                
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($order->id); ?></td>
                                                <td><?php echo e($order->created_at); ?></td>
                                                <td><?php echo e($order->new_product_count); ?></td>
                                                <td><?php echo e($order->total); ?></td>
                                                <td><?php echo e($order->delivery_amount); ?></td>
                                                <td>
                                                    <?php if($order->payment): ?>
                                                        <?php echo e($order->payment->status == 'failed' ? __('body.canceled') : $order->payment->status); ?>

                                                    <?php elseif($order->payment_method == 'cash'): ?>
                                                        <?php echo e(__('body.cash')); ?>

                                                        <?php else: ?>
                                                        <?php echo e(__('body.Pending')); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <th>
                                                    <?php if($order->payment): ?>
                                                    <?php if($order->payment->status != 'success'): ?>
                                                    <a href="<?php echo e(route('checkout.payment.paynow',$order->id)); ?>" class="btn btn-success rounded">
                                                     <?php echo e(__('body.PAY_NOW')); ?>

                                                    </a>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    
                                                    <a href="<?php echo e(route('profile.myOrder.orderDetails',$order->id)); ?>" class="btn btn-primary rounded"><?php echo e(__('body.details')); ?></a>
                                                </th>
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
<?php echo $__env->make('main/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/main/profile/myOrders.blade.php ENDPATH**/ ?>