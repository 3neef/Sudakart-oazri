
<?php $__env->startSection('title',  __('adminNav.order_list')); ?>
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
                                <th><?php echo e(__('adminBody.customer_name')); ?></th>
                                <th><?php echo e(__('adminBody.Product_Name')); ?></th>
                                <th><?php echo e(__('adminDash.payment_method')); ?></th>
                                <th><?php echo e(__('adminBody.delivery_amount')); ?></th>
                                <th><?php echo e(__('adminBody.order_status')); ?></th>
                                <th><?php echo e(__('adminBody.date')); ?></th>
                                <th><?php echo e(__('adminBody.total')); ?></th>
                                <th><?php echo e(__('adminBody.Approved')); ?></th>
                                <th><?php echo e(__('adminBody.Actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                        <tr>
                            <td>#<?php echo e($order->id); ?></td>
                            <td><?php echo e($order->customer->name); ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <?php $__currentLoopData = $order->products->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            <td>
                                <a  href="javascript:void(0)">
                                    <span data-id="<?php echo e($order->id); ?>" class="badge badge-success asign-ticket"><?php echo e($order->status); ?></span>
                                </a>
                            </td>
                            <td><?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->format('d-m-Y')); ?></td>
                            <td><?php echo e($order->total); ?> OMR</td>
                            <?php if($order->approved == true): ?>
                            <td class="td-check">
                                <i data-feather="check-circle"></i>
                            </td>
                                
                            <?php else: ?>
                                
                            <td class="td-cross">
                                <i data-feather="x-circle"></i>
                            </td>
                            <?php endif; ?>
                            <td>
                                <div style="display: flex;">
                                <?php if(auth()->user()->userable_type == 'App\Models\Admin' && $order->approved == 0 && $order->status == 'completed'): ?>
                                <a class=" mx-1 btn btn-success" href="<?php echo e(route('admin.orders.approve', $order->id)); ?>" aria-label="Approve Order" style="padding: 5px 5px;">
                                    <i class="fa fa-check-circle px-1" aria-hidden="true" title="Approve Order"></i>
                                </a>
                                <?php endif; ?>
                                <a class=" mx-1 btn btn-warning" href="<?php echo e(route('admin.orders.show', $order->id)); ?>" aria-label="Show Order" style="padding: 5px 5px;">
                                    <i class="fa fa-eye  px-1" aria-hidden="true" title="Show Order"></i>
                                </a>
                                <?php if(auth()->user()->userable_type == 'App\Models\Admin'): ?>
                                <?php if($order->status != 'canceled'): ?>
                                <a class=" mx-1 btn btn-primary" href="<?php echo e(route('admin.orders.cancel', $order->id)); ?>" aria-label="Cancel Order" style="padding: 5px 5px;">
                                    <i class="fa fa-ban  px-1" aria-hidden="true" title="Cancel Order"></i>
                                </a>
                                <?php endif; ?>
                                <?php if($order->status != 'canceled' && $order->approved == 1): ?>
                                <a class=" mx-1 btn btn-info" href="<?php echo e(route('admin.orders.sendtoDelivery', $order->id)); ?>" aria-label="Send Order To Delivery" style="padding: 5px 5px;">
                                    <i class="fa fa-paper-plane  px-1" aria-hidden="true" title="Send Order To Delivery"></i>
                                </a>
                                <?php endif; ?>

                                <a class=" mx-1 btn btn-secondary" href="<?php echo e(route('admin.orders.print', $order->id)); ?>" aria-label="Order Recipt" style="padding: 5px 5px;">
                                    <i class="fa fa-file-text-o  px-1" aria-hidden="true" title="Order Recipt"></i>
                                </a>
                                <?php endif; ?>

                                </div>
                                
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
             <div class="d-flex justify-content-center">
                    <?php echo $orders->links(); ?>

                </div>
        </div>
    </div>
</div>



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="return-order-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">Change order status</h5>
            </div>
            <div class="modal-body">
                <form id="asign-ticket" action="#" method="POST" id="return-order-form">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="">Change Status</label>
                        <div class="col-md-7">
                        <select class="mySelect2 form-control" name="status" required>
                            <option value="completed">completed</option>
                            <option value="canceled">canceled</option>
                            <option value="in progress">in progress</option>
                            <option value="pending">Pending</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-outline-success">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" id="clsBtnFooter" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('main/js/modal/order.js')); ?>" defer></script>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $('.asign-ticket').on('click',function () {  
    var id = $(this).data('id');
    console.log(id);
    $('#asign-ticket').attr('action', '/admin/orders/status/'+id);
    $('#return-order-modal').modal('show');
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/orders/index.blade.php ENDPATH**/ ?>