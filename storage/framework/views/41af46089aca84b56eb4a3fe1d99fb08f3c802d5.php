
<?php $__env->startSection('title', __('adminBody.CANCELED_ORDERS_LIST')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <!-- <div class="card-header">
                    <h5>Manage Order</h5>
                </div> -->
                <div class="card-body order-datatable">
                    <table class="display" id="basic-1">
                        <thead>
                            <tr>
                                <th><?php echo e(__('adminBody.Ref_No')); ?></th>
                                <th><?php echo e(__('adminBody.Product_Name')); ?></th>
                                <th><?php echo e(__('adminDash.payment_method')); ?></th>
                                <th><?php echo e(__('adminBody.delivery_amount')); ?></th>
                                <th><?php echo e(__('adminBody.order_status')); ?></th>
                                <th><?php echo e(__('adminBody.date')); ?></th>
                                <th><?php echo e(__('adminBody.total')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                        <tr>
                            <td>#<?php echo e($order->id); ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <img src="<?php echo e(asset($product->product->first)); ?>" alt=""
                                            class="img-fluid img-30 me-2 blur-up lazyloaded">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </td>
                            <td>
                                <?php if($order->payment_method == 'online'): ?>
                                    
                                <span class="badge badge-secondary"><?php echo e($order->payment_method); ?></span>
                                <?php else: ?>
                                
                                <span class="badge badge-danger"><?php echo e($order->payment_method); ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($order->delivery_amount); ?></td>
                            <td><span class="badge badge-danger"><?php echo e($order->status); ?></span></td>
                            <td><?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->format('d-m-Y')); ?></td>
                            <td><?php echo e($order->total); ?> OMR</td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/orders/canceled.blade.php ENDPATH**/ ?>