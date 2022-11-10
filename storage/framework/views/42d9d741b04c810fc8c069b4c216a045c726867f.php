
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

                                    <td data-field="name"><?php echo e($product->product ? $product->product->name : 'deleted product id=  '.$product->order_product_id); ?></td>

                                    <td data-field="price"><?php echo e($product->status); ?></td>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/orders/returned.blade.php ENDPATH**/ ?>