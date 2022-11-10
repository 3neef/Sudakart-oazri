
<?php $__env->startSection('title', __('adminBody.EXPENSE_TYPES_LIST')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-inline search-form search-box">

                    </form>

                    <a href="<?php echo e(route('admin.accounting.expensetypes.create')); ?>" class="btn btn-primary mt-md-0 mt-2"><?php echo e(__('adminBody.new_expenses_type')); ?></a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="all-package coupon-table table table-striped">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('adminBody.Name')); ?></th>
                                    <th><?php echo e(__('adminBody.Created_On')); ?></th>
                                    <th><?php echo e(__('adminBody.Actions')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-row-id="<?php echo e($expense->id); ?>">
                                    <td><?php echo e($expense->name); ?></td>

                                    <td class="list-date"><?php echo e($expense->created_at); ?></td>

                                    <td>
                                        <a href="<?php echo e(route('admin.accounting.expensetypes.edit', $expense->id)); ?>">
                                            <i class="fa fa-edit" title="Edit"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.accounting.expensetypes.destroy', $expense->id)); ?>" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                            <input type="submit" class="fa fa-trash" value="Delete">
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/accounting/expenses/typeindex.blade.php ENDPATH**/ ?>