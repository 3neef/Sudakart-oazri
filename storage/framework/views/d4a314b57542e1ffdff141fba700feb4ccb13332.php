
<?php $__env->startSection('title', 'Users List'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">

            <a href="<?php echo e(route('admin.admin-create')); ?>" class="btn btn-primary mt-md-0 mt-2">Create a user</a>
        </div>
        <div class="card-body vendor-table">
            <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>secondary phone</th>
                        <th>secondary email</th>
                        <th>address</th>
                        <th>created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($admin->id); ?></td>
                        <td><?php echo e($admin->name); ?></td>
                        <td><?php echo e($admin->secondary_phone); ?></td>
                        <td><?php echo e($admin->secondary_email); ?></td>
                        <td><?php echo e($admin->address); ?></td>
                        <td><?php echo e($admin->created_at); ?></td>
                        <td>
                            <div>
                                <i class="fa fa-edit me-2 font-success"></i>
                                <i class="fa fa-trash font-danger"></i>
                            </div>
                        </td>
                    </tr>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/admin/users/index.blade.php ENDPATH**/ ?>