
<?php $__env->startSection('title', 'Inbounds List'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title=""><?php echo e(__('adminNav.expenses_report')); ?></a></li>
                    </ul>
                    <?php if($errors->count() > 0): ?>
                    <?php echo e($errors); ?>

                        
                    <?php endif; ?>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="GET" action="<?php echo e(route('admin.expenses-report.request')); ?>" class="needs-validation user-add">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('body.expense_type')); ?></label>
                                    <div class="col-md-7">
                                        <select class="js-example-basic-multiple form-control" name="driver_id" multiple="multiple">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary" value="<?php echo e(__('adminBody.save')); ?>"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('admin.orders.inbound.drivers')); ?>" class="needs-validation" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="table-responsive table-desi">
                            <table class="table all-package" id="editableTable">
                                <thead>
                                    <tr>
                                        <th><input id="selectAll" type="checkbox"></th>
                                        <th>Order Image</th>
                                        <th>Order Code</th>
                                        <th>Date</th>
                                        <th>Payment Method</th>
                                        <th>Delivery Status</th>
                                        <th>Amount</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><input name="ids[]" value="<?php echo e($order->id); ?>" type="checkbox" ></td>
                                        <td>
                                            <img src="<?php echo e(asset($order->product->first)); ?>" alt="pics">
                                        </td>

                                        <td data-field="number">+<?php echo e($order->order_id); ?></td>

                                        <td data-field="date"><?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->format('d-m-Y')); ?></td>

                                        <td data-field="text">
                                            <?php if($order->order->payment_method == 'online'): ?>
                                            <span class="badge badge-secondary"><?php echo e(__('body.online')); ?></span>
                                            <?php elseif($order->order->payment_method == 'bank'): ?>
                                            <span class="badge badge-dark"><?php echo e(__('body.bank_transfer')); ?></span>
                                            <?php else: ?>
                                            <span class="badge badge-danger"><?php echo e(__('body.cash')); ?></span>
                                            <?php endif; ?>  
                                        </td>
                                        <?php if($order->status == 'pending'): ?>
                                        <td class="order-pending">
                                            
                                            <?php elseif($order->status == 'taken'): ?>
                                            <td class="order-warning">
                                            <?php elseif($order->status == 'delivered'): ?>
                                            <td class="order-success">
                                                <?php elseif($order->status == 'canceled' || $order->status == 'returned'): ?>
                                                <td class="order-cancle">
                                                <?php elseif($order->status == 'packaging'): ?>
                                                <td class="order-continue">
                                            
                                        <?php endif; ?>
                                            <span><?php echo e($order->status); ?></span>
                                        </td>

                                        <td data-field="number"><?php echo money($order->price ,'OMR'); ?></td>

                                        <td>
                                            <a href="<?php echo e(route('admin.orders.inbound.edit', $order->id)); ?>">
                                                <i class="fa fa-edit" title="Edit"></i>
                                            </a>

                                            <a href="javascript:void(0)">
                                                <i class="fa fa-trash" title="Delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('adminBody.save')); ?></button>
                        </div>
                    </form>
                </div>
                <div class="d-flex justify-content-center">
                    <?php echo $orders->links(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
    <script>
        $("#selectAll").click(function() {
            $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
            });

            $("input[type=checkbox]").click(function() {
            if (!$(this).prop("checked")) {
                $("#selectAll").prop("checked", false);
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/panel/orders/inbound.blade.php ENDPATH**/ ?>