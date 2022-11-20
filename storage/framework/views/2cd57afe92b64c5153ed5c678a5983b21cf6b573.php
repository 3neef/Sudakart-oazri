
<?php $__env->startSection('title', __('adminBody.Returned_Products_List')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    

                    
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table list-digital all-package table-category "
                            id="editableTable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('adminDash.order_ref')); ?></th>
                                    <th><?php echo e(__('adminBody.product_image')); ?></th>
                                    <th><?php echo e(__('adminBody.customer_name')); ?></th>
                                    <th><?php echo e(__('adminBody.Product_Name')); ?></th>
                                    <th><?php echo e(__('adminDash.product_status')); ?></th>
                                    <th><?php echo e(__('adminDash.reason')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td data-field="name">#<?php echo e($product->order_id); ?></td>


                                    <td>
                                      
                                        <img src="<?php echo e(asset($product->product ? $product->product->first : 'images/placeholder.png')); ?>"
                                            data-field="image" alt="
                                            ">
                                        
                                    </td>
                                    <td data-field="name"><?php echo e($product->orderProduct ? $product->orderProduct->order->customer->name : 'deleted customer'); ?></td>

                                    <td data-field="name"><?php echo e($product->product ? $product->product->name : ''); ?></td>

                                    <td>
                                        <a  href="javascript:void(0)" >
                                            <span data-id="<?php echo e($product->id); ?>" 
                                                class=" badge
                                                <?php if($product->status == 'pending'): ?>
                                                    badge-danger
                                                <?php elseif($product->status == 'approved'): ?>
                                                    badge-info
                                                <?php elseif($product->status == 'returned'): ?>
                                                    badge-secondary
                                                <?php elseif($product->status == 'refunded'): ?>
                                                    badge-success
                                                <?php elseif($product->status == 'rejected'): ?>
                                                    badge-primary
                                                <?php endif; ?>
                                                    asign-ticket">
                                                <?php echo e($product->status); ?>

                                            </span>
                                        </a>
                                    </td>

                                    <td data-field="name"><?php echo e($product->reason); ?></td>
                                    
                                </tr>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="d-flex justify-content-center">
                        <?php echo $products->links(); ?>

                    </div>
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
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label for="">Change Status</label>
                        <div class="col-md-7">
                        <select class="mySelect2 form-control" name="status" required>
                            <option value="rejected">rejected</option>
                            <option value="refunded">refunded</option>
                            <option value="approved">approved</option>
                            <option value="returned">returned</option>
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
            // alert('haaaay');
            var id = $(this).data('id');
            console.log(id);
            $('#asign-ticket').attr('action', '/admin/orders/returned/'+id);
            $('#return-order-modal').modal('show');
    
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/orders/returned.blade.php ENDPATH**/ ?>