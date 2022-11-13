
<?php $__env->startSection('title', __('adminBody.product_list')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    
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
                                    <th><?php echo e(__('adminBody.price')); ?></th>
                                    <th><?php echo e(__('adminBody.stoped')); ?></th>
                                    <th><?php echo e(__('adminBody.option')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($product->id); ?></td>

                                    <td>

                                        <img src="<?php echo e(asset($product->first)); ?>" data-field="image" alt="
                                            ">

                                    </td>

                                    <td data-field="name"><?php echo e($product->name); ?></td>

                                    <td data-field="price"><?php echo e($product->category->name); ?></td>

                                    <td data-field="name"><?php echo e($product->price); ?></td>
                                    <?php if($product->stop == false): ?>
                                    <td class="td-check">
                                        <i data-feather="check-circle"></i>
                                    </td>

                                    <?php else: ?>

                                    <td class="td-cross">
                                        <i data-feather="x-circle"></i>
                                    </td>
                                    <?php endif; ?>

                                    <td>
                                        
                                        <a href="<?php echo e(route('admin.products.show', $product->id)); ?>">
                                            <i class="fa fa-eye" title="show"></i>
                                        </a>
                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-product')): ?>
                                        
                                        <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>">
                                            <i class="fa fa-edit" title="edit"></i>
                                        </a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-product')): ?>
                                        <a href="<?php echo e(route('admin.products.stop', $product->id)); ?>">
                                            <i class="fa fa-stop" title="stop"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash"></i></button>
                                        </form>
                                        <?php endif; ?>
                                    </td>
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/products/index.blade.php ENDPATH**/ ?>