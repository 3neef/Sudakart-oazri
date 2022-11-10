
<?php $__env->startSection('content'); ?>
<!-- breadcrumb start -->
<div class="breadcrumb-section bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2><?php echo e(__('body.Order_Details')); ?></h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><?php echo e(__('body.home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('body.order_history')); ?></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('body.Order_Details')); ?></li>
                    </ol>
                </nav>
            </div>
            <?php echo $__env->make('main/partials/profile-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-md-9">
                <?php if(session('orderDeleted')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('orderDeleted')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session('deletedFailed')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('deletedFailed')); ?>

                    </div>
                <?php endif; ?>
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
                                                    
                                                   <?php if($order->status == 'pending'): ?>
                                                   <a href="<?php echo e(route('main.order.cancelOrder',$order->id)); ?>" class="btn btn-danger btn-sm rounded"><?php echo e(__('body.cancel_order')); ?></a>
                                                   <?php endif; ?>
                                                   <?php if($order->status == 'completed'): ?>
                                                    <button class="btn btn-danger rounded btn-sm"
                                                        id="return-order-btn"><?php echo e(__('body.return_product')); ?>

                                                   </button>
                                                   <?php endif; ?>
                                                   
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
                                                <th><?php echo e(__('body.options')); ?></th>
                                                <th><?php echo e(__('body.quantity')); ?></th>
                                                <th><?php echo e(__('body.price')); ?></th>
                                                <th><?php echo e(__('body.payment_status')); ?></th>
                                            </thead>
                                            <tbody>

                                                <?php $__currentLoopData = $order->newProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>

                                                    <td><?php echo e($one->pivot->id); ?></td>
                                                    <td><?php echo e($one->pivot->created_at); ?></td>
                                                    <td><?php echo e($one->en_name); ?></td>
                                                    <td>
                                           
                                                    </td>
                                                    <td><?php echo e($one->pivot->quantity); ?></td>
                                                    <td><?php echo e(number_format($one->pivot->price * $one->pivot->quantity,2)); ?>

                                                    </td>
                                                    <td>
                                                        <?php if($order->payment): ?>
                                                        <?php echo e($order->payment->status); ?>

                                                        <?php else: ?>
                                                        <?php echo e(__('body.Pending')); ?>

                                                        <?php endif; ?>
                                                    </td>
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
                            
                            <?php if($delivery['status'] != 0): ?>
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
                                                <th><?php echo e(__('body.phone')); ?></th>
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
<!-- breadcrumb End -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="return-order-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">Choose A Product To Return</h5>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="return-order-form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                    <div class="form-group">
                        <label for="">Choose Product</label>
                        <select name="order_product_id" class="form-control" required>
                            <option value=""></option>
                            <?php $__currentLoopData = $order->newProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($one->pivot->id); ?>"><?php echo e($one->en_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Choose a reason</label>
                        <select name="reason_id" class="form-control" required>
                            <option value=""></option>
                            <?php $__currentLoopData = $reasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($reason->en_name); ?>"><?php echo e($reason->en_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Request" class="btn btn-danger">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="clsBtnFooter" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('main/js/modal/order.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/main/profile/orderDetails.blade.php ENDPATH**/ ?>