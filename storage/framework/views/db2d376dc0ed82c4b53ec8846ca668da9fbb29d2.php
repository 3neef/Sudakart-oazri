
<?php $__env->startSection('title', 'Show Order Detail'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <section class="section-b-space pt-0 ratio_asos">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="returned-message"></div>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="header-title">
                                            <h4 style="<?php if(app()->getLocale() == 'en'): ?>float: left; <?php else: ?> float: right; <?php endif; ?> "><?php echo e(__('body.Order_Details')); ?></h4>
                                            <div style="<?php if(app()->getLocale() == 'en'): ?>float: right; <?php else: ?> float: left; <?php endif; ?>">                                                  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                        <table class="table table-striped table-hovered">
                                            <thead>
                                                <th>#<?php echo e(__('body.refrence_number')); ?></th>
                                                <th><?php echo e(__('body.date')); ?></th>
                                                <th><?php echo e(__('body.product')); ?></th>
                                                <th><?php echo e(__('body.quantity')); ?></th>
                                                <th><?php echo e(__('body.price')); ?></th>
                                                <?php if(auth()->user()->userable_type == 'App\Models\Admin'): ?>
                                                <th><?php echo e(__('body.payment_status')); ?></th>
                                                <?php endif; ?>
                                            </thead>
                                            <tbody>

                                                <?php $__currentLoopData = $order->newProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>

                                                    <td><?php echo e($one->pivot->id); ?></td>
                                                    <td><?php echo e($one->pivot->created_at); ?></td>
                                                    <td><?php echo e($one->en_name); ?></td>
                                                    <td><?php echo e($one->pivot->quantity); ?></td>
                                                    <td><?php echo e(number_format($one->pivot->price * $one->pivot->quantity,2)); ?>

                                                    </td>
                                                    <?php if(auth()->user()->userable_type == 'App\Models\Admin'): ?>
                                                    <td>
                                                        <?php if($order->payment): ?>
                                                        <?php echo e($order->payment->status); ?>

                                                        <?php else: ?>
                                                        <?php echo e(__('body.Pending')); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                    <?php endif; ?>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                        </div>
                                        
                                    </div>
                                    <div class="card-footer">

                                    </div>
                                </div>
                            </div>
                            
                            <?php if(auth()->user()->userable_type == 'App\Models\Admin' && $delivery['status'] != 0): ?>
                            <div class="col-lg-12 mt-3">
                                <div id="returned-message"></div>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="header-title">
                                            <h4 style="<?php if(app()->getLocale() == 'en'): ?>float: left; <?php else: ?> float: right; <?php endif; ?>"><?php echo e(__('body.Delivery_Details')); ?></h4>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hovered">
                                            <thead>
                                                <th>#<?php echo e(__('body.refrence_number')); ?></th>
                                                <th><?php echo e(__('body.address')); ?></th>
                                                <th><?php echo e(__('body.address')); ?></th>
                                                <th><?php echo e(__('body.cash')); ?></th>
                                                <th><?php echo e(__('body.status')); ?></th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo e($delivery['data']['ref_no']); ?></td>
                                                    <td>
                                                        <?php echo e($delivery['data']['phone']); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($delivery['data']['region'] . ' , ' .
                                                        $delivery['data']['address']); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($delivery['data']['price']); ?>

                                                    </td>
                                                    <td>
                                                        <?php if($order->status == 'pending' ): ?>
                                                        <?php echo e(__('body.Pending')); ?>

                                                        <?php elseif($order->status == 'in progress'): ?>
                                                        <?php echo e(__('body.in_progress')); ?>

                                                        <?php elseif($order->status == 'completed'): ?>
                                                        <?php echo e(__('body.order_completed')); ?>

                                                        <?php elseif($order->status == 'canceled'): ?>
                                                        <?php echo e(__('body.canceled')); ?>

                                                        <?php endif; ?>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="card-footer">

                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/orders/show.blade.php ENDPATH**/ ?>