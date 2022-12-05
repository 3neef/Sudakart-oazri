
<?php $__env->startSection('title', __('adminBody.product_list')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <form action="<?php echo e(route('admin.products.search')); ?>" method="get" class="search-form" role="search" style="position: relative;">
                        <div class="input-group mb-3">
                            <input type="search" name="q"  placeholder="<?php echo e(__('labels.search')); ?>" class="input-group-field" 
                                autocomplete="off"> 
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit"><?php echo e(__('body.search-btn')); ?></button>
                            </div>
                        </div>
                    </form>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-product', auth()->user())): ?>
                    <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary mt-md-0 mt-2">
                        <?php echo e(__('adminBody.new_product')); ?>

                    </a>
                    <?php endif; ?>

                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table list-digital all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('adminBody.Product_Id')); ?></th>
                                    <th><?php echo e(__('adminBody.product_image')); ?></th>
                                    <th><?php echo e(__('adminBody.Product_Name')); ?></th>
                                    <th><?php echo e(__('adminBody.product_category')); ?></th>
                                    <th><?php echo e(__('adminBody.Quantity')); ?></th>
                                    <th><?php echo e(__('body.sku')); ?></th>
                                    <th><?php echo e(__('adminBody.price')); ?></th>
                                    <th><?php echo e(__('adminBody.stoped')); ?></th>
                                    <th><?php echo e(__('adminBody.option')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($product->id); ?></td>

                                    <td>

                                        <img src="<?php echo e(asset($product->first)); ?>" data-field="image" alt="
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

                                    <td data-field="name"><?php echo e($product->quantity > 0 ? $product->quantity : 0); ?></td>

                                    <td data-field="name"><?php echo e($product->sku); ?></td>

                                    <td data-field="name"><?php echo money($product->price, 'OMR'); ?></td>
                                    <?php if($product->stop == false): ?>
                                    <td class="td-check">
                                        <i data-feather="check-circle"  class="text-success"></i>
                                    </td>

                                    <?php else: ?>

                                    <td class="td-cross">
                                        <i data-feather="x-circle"  class="text-danger"></i>
                                    </td>
                                    <?php endif; ?>

                                    <td>
                                        <div style="display: flex;">
                                        <a class="mx-1" href="<?php echo e(route('admin.products.show', $product->id)); ?>">
                                            <i class="fa fa-eye text-warning" title="<?php echo e(__('body.show')); ?>"></i>
                                        </a>
                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-product')): ?>
                                        
                                        <a class="mx-1" href="<?php echo e(route('admin.products.edit', $product->id)); ?>">
                                            <i class="fa fa-edit text-primary" title="<?php echo e(__('body.edit')); ?>"></i>
                                        </a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-product')): ?>
                                        <a class="mx-1" href="<?php echo e(route('admin.products.stop', $product->id)); ?>">
                                            <i class="fa fa-stop" title="<?php echo e(__('body.stop')); ?>"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash text-danger" title="<?php echo e(__('body.delete')); ?>" ></i></button>
                                        </form>
                                        <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <h3 class="text-center text-danger"><?php echo e(__('labels.no_result')); ?></h3>
                                </tr>
                                <?php endif; ?>
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/panel/products/index.blade.php ENDPATH**/ ?>