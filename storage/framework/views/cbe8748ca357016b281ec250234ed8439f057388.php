
<?php $__env->startSection('title', __('adminNav.categories')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-primary add-row mt-md-0 mt-2"><?php echo e(__('adminBody.NEW_Category')); ?></a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('adminBody.Image')); ?></th>
                                    <th><?php echo e(__('body.name')); ?></th>
                                    <th><?php echo e(__('form.en_name')); ?></th>
                                    <th><?php echo e(__('body.commission')); ?></th>
                                    <th><?php echo e(__('body.color')); ?></th>
                                    <th><?php echo e(__('adminBody.Actions')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    
                                <tr>
                                    <td>
                                        <img src="<?php echo e(asset($category->image)); ?>"
                                            data-field="image" alt="">
                                    </td>

                                    <td data-field="name"><?php echo e($category->name); ?></td>

                                    <td data-field="name"><?php echo e($category->en_name); ?></td>

                                    <td data-field="price"><?php echo e($category->commission); ?></td>

                                    <td>
                                        <span style="background: <?php echo e($category->color); ?>; color: white"><?php echo e(__('body.color')); ?></span>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>">
                                            <i class="fa fa-edit" title="<?php echo e(__('body.edit')); ?>"></i>
                                        </a>

                                        <form action="<?php echo e(route('admin.categories.destroy', $category->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash" title="<?php echo e(__('body.delete')); ?>"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <?php echo $categories->links(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/settings/categories/index.blade.php ENDPATH**/ ?>