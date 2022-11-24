
<?php $__env->startSection('title', __('adminNav.reasons')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">

                    <a href="<?php echo e(route('admin.reason.create')); ?>" class="btn btn-primary add-row mt-md-0 mt-2"><?php echo e(__('adminBody.new_reason')); ?></a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('body.name')); ?></th>
                                    <th><?php echo e(__('form.en_name')); ?></th>
                                    <th><?php echo e(__('adminBody.Actions')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $reasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td data-field="name"><?php echo e($reason->name); ?></td>

                                    <td data-field="name"><?php echo e($reason->en_name); ?></td>

                                    <td>
                                        <a href="<?php echo e(route('admin.reason.edit', $reason->id)); ?>">
                                            <i class="fa fa-edit" title="<?php echo e(__('body.edit')); ?>"></i>
                                        </a>

                                        <form action="<?php echo e(route('admin.reason.destroy', $reason->id)); ?>" method="POST">
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
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/settings/reasons/index.blade.php ENDPATH**/ ?>