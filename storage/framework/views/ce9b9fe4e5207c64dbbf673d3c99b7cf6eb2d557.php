
<?php $__env->startSection('title',  __('adminNav.order_list')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <!-- <div class="card-header">
                    <h5>Manage Order</h5>
                </div> -->
                 <div class="table-responsive table-desi">
                        <table class="table all-package">
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
                                <th><?php echo e(__('adminBody.manage')); ?></th>
                                <th><?php echo e(__('adminBody.Actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                        <tr>
                            <td>#<?php echo e($order->id); ?></td>
                            <td><?php echo e($order->customer ? $order->customer->name : 'deleted'); ?></td>
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
                                <?php elseif($order->payment_method == 'bank'): ?>
                                <span class="badge badge-dark"><?php echo e($order->payment_method); ?></span>
                                <?php else: ?>
                                <span class="badge badge-danger"><?php echo e($order->payment_method); ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($order->delivery_amount); ?></td>
                            <td>
                                <a  href="javascript:void(0)"  class="<?php echo e($order->handover == 1 ? 'disabled' : ''); ?>" style="<?php echo e($order->handover == 1 ? 'pointer-events: none;' : ''); ?>">
                                    <span data-id="<?php echo e($order->id); ?>" 
                                        class=" badge
                                        <?php if($order->status == 'pending'): ?>
                                            badge-danger
                                        <?php elseif($order->status == 'in progress'): ?>
                                            badge-info
                                        <?php elseif($order->status == 'completed'): ?>
                                            badge-success
                                        <?php elseif($order->status == 'canceled'): ?>
                                            badge-primary
                                        <?php endif; ?>
                                            asign-ticket">
                                        <?php echo e($order->status); ?>

                                    </span>
                                </a>
                            </td>
                            <td><?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->format('d-m-Y')); ?></td>
                            <td><?php echo money($order->total,'OMR'); ?></td>
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
                                <span
                                    class=" badge
                                    <?php if($order->handover == 0): ?>
                                        badge-danger
                                    <?php elseif($order->handover == 1): ?>
                                        badge-info
                                    <?php endif; ?>
                                        ">
                                    <?php if($order->handover == 0): ?>
                                    <?php echo e(__('adminBody.self')); ?>

                                    <?php elseif($order->handover == 1): ?>
                                    <?php echo e(__('adminBody.party')); ?>

                                    <?php endif; ?>
                                </span>
                            </td>
                            <td>
                                <div style="display: flex;">
                                <?php if(auth()->user()->userable_type == 'App\Models\Admin' && $order->delivery_ref_id == null && $order->status != 'completed' && $order->status != 'canceled' && Str::contains($order->region_id, 'region_') == false): ?>
                                <a class=" mx-1 btn btn-success" href="javascript:void(0)" style="padding: 5px 5px;">
                                    <i  data-id="<?php echo e($order->id); ?>" class="fa fa-dot-circle-o px-1 status-ticket" title="change status"></i>
                                </a>
                                <?php endif; ?>
                                <?php if(auth()->user()->userable_type == 'App\Models\Admin' && $order->approved == 0 && $order->status == 'completed'): ?>
                                <a class=" mx-1 btn btn-success" href="<?php echo e(route('admin.orders.approve', $order->id)); ?>" aria-label="Approve Order" style="padding: 5px 5px;">
                                    <i class="fa fa-check-circle px-1" aria-hidden="true" title="Approve Order"></i>
                                </a>
                                <?php endif; ?>
                                <a class=" mx-1 btn btn-warning" href="<?php echo e(route('admin.orders.show', $order->id)); ?>" aria-label="Show Order" style="padding: 5px 5px;">
                                    <i class="fa fa-eye  px-1" aria-hidden="true" title="Show Order"></i>
                                </a>
                                <?php if(auth()->user()->userable_type == 'App\Models\Admin'): ?>
                                <?php if($order->status == 'pending'): ?>
                                <a class=" mx-1 btn btn-primary" href="<?php echo e(route('admin.orders.cancel', $order->id)); ?>" aria-label="Cancel Order" style="padding: 5px 5px;">
                                    <i class="fa fa-ban  px-1" aria-hidden="true" title="Cancel Order"></i>
                                </a>
                                <?php endif; ?>
                                <?php if($order->status != 'canceled' && $order->handover == 1 && $order->delivery_ref_id == null && Str::contains($order->region_id, 'region_') == false): ?>
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


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="return-ticket-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">Change the ticket status</h5>
            </div>
            <div class="modal-body">
                <form id="status-ticket" action="#" method="POST" id="return-ticket-form">
                    <?php echo csrf_field(); ?>
                   <?php echo method_field('put'); ?>

                    <div class="form-group">
                        <label for="">Choose a Status</label>
                        <div class="col-md-7">
                        <select class="mySelect2 form-control" name="handover" required>
                            <option value="0"><?php echo e(__('adminBody.self')); ?></option>
                            <option value="1"><?php echo e(__('adminBody.party')); ?></option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Request" class="btn btn-success">
                    </div>

                </form>
            </div>
            
        </div>
    </div>
</div>



<script src="<?php echo e(asset('main/js/modal/order.js')); ?>" defer></script>
<script src="<?php echo e(asset('main/js/modal/ticket.js')); ?>" defer></script>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $('.asign-ticket').on('click',function () {  
        if($(this).closest().hasClass('disabled')) {
            alert('hi');
        }else {
            // alert('haaaay');
            var id = $(this).data('id');
            console.log(id);
            $('#asign-ticket').attr('action', '/admin/orders/status/'+id);
            $('#return-order-modal').modal('show');
        }
    
});
</script>
<script>
    $('.status-ticket').on('click',function () {  
    var id = $(this).data('id');
    console.log(id);
    $('#status-ticket').attr('action', '/admin/orders/handover/'+id);
    $('#return-ticket-modal').modal('show');
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/orders/index.blade.php ENDPATH**/ ?>