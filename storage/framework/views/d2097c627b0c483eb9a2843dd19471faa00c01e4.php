
<?php $__env->startSection('title', __('adminNav.most_sold_products')); ?>
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
                                    <th><?php echo e(__('adminBody.Product_Id')); ?></th>
                                    <th><?php echo e(__('adminBody.product_image')); ?></th>
                                    <th><?php echo e(__('adminBody.Product_Name')); ?></th>
                                    <th><?php echo e(__('adminBody.product_category')); ?></th>
                                    <th><?php echo e(__('adminBody.price')); ?></th>
                                    <th><?php echo e(__('adminBody.sold')); ?></th>
                                    <th><?php echo e(__('adminBody.stoped')); ?></th>
                                    
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                     <td><?php echo e($loop->index + 1); ?></td>

                                    <td>
                                    
                                        <img src="<?php echo e(asset($product->first)); ?>"
                                            data-field="image" alt="
                                            ">
                                        
                                    </td>
                                        
                                    <td data-field="name">
                                        <?php if(app()->getLocale() == 'en'): ?>
                                        <?php echo e($product->en_name); ?>

                                        <?php else: ?>
                                        <?php echo e($product->name); ?>

                                        <?php endif; ?>    
                                    </td>

                                    <td data-field="price">
                                        <?php if(app()->getLocale() == 'en'): ?>
                                        <?php echo e($product->category->en_name); ?>

                                        <?php else: ?>
                                        <?php echo e($product->category->name); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td data-field="name"><?php echo e($product->price); ?></td>

                                    <td data-field="name"><?php echo e($product->orders_count); ?></td>
                                    <?php if($product->stop == false): ?>
                                    <td class="td-check">
                                        <i data-feather="check-circle"></i>
                                    </td>
                                        
                                    <?php else: ?>
                                        
                                    <td class="td-cross">
                                        <i data-feather="x-circle"></i>
                                    </td>
                                    <?php endif; ?>

                                  
                                </tr>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/analytics/mostsold.blade.php ENDPATH**/ ?>