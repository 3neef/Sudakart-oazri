
<?php $__env->startSection('title', __('adminBody.Products_Stoped')); ?>
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
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($product->id); ?></td>

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

                                    <td data-field="name"><?php echo money($product->price, 'OMR'); ?></td>
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/panel/products/stoped.blade.php ENDPATH**/ ?>