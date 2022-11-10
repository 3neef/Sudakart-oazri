
<?php $__env->startSection('title', 'Attributes'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-inline search-form search-box">
                        <div class="form-group">
                            <input class="form-control-plaintext" type="search" placeholder="Search..">
                        </div>
                    </form>

                    <a href="<?php echo e(route('admin.attribute.create')); ?>" class="btn btn-primary add-row mt-md-0 mt-2">Add
                        New Attribute</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>English Name</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>

                                    <td data-field="name"><?php echo e($attribute->name); ?></td>

                                    <td data-field="name"><?php echo e($attribute->name); ?></td>

                                    <td>
                                        <a href="<?php echo e(route('admin.attribute.show', $attribute->id)); ?>">
                                            <i class="fa fa-eye" title="show"></i>
                                        </a>

                                        <form action="<?php echo e(route('admin.attribute.destroy', $attribute->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/settings/attributes/index.blade.php ENDPATH**/ ?>