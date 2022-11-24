
<?php $__env->startSection('title', __('adminBody.EXPENSES_LIST')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary mt-md-0 mt-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo e(__('adminBody.expenses_type')); ?>

                        </button>
                        <ul class="dropdown-menu">
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a class="dropdown-item" href="?filter[expense_type_id]=<?php echo e($id); ?>"><?php echo e($entry); ?></a></li>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <a href="<?php echo e(route('admin.accounting.expenses.create')); ?>" class="btn btn-primary mt-md-0 mt-2"><?php echo e(__('adminBody.new_expenses')); ?></a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="all-package coupon-table table table-striped">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('adminBody.Name')); ?></th>
                                    <th><?php echo e(__('adminBody.price')); ?></th>
                                    <th><?php echo e(__('adminBody.Receipt')); ?></th>
                                    <th><?php echo e(__('adminBody.Download_Receipt')); ?></th>
                                    <th><?php echo e(__('adminBody.Created_On')); ?></th>
                                    <th><?php echo e(__('adminBody.Actions')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-row-id="<?php echo e($expense->id); ?>">
                                    <td><?php echo e($expense->expense_type->name); ?></td>

                                    <td >
                                        <span><?php echo e($expense->price); ?></span>
                                    </td>

                                    <td>
                                        
                                        <img id="idimage" src="<?php echo e(asset($expense->image)); ?>" onclick="newTabImage()"
                                            data-field="image" alt="
                                            ">
                                    
                                    </td>
                                     <td>
                                        <a class="button" href="<?php echo e(asset($expense->image)); ?>" download="Receipt.jpg"><i class="fa fa-download" aria-hidden="true"></i></a>
                                    </td>

                                    <td class="list-date"><?php echo e($expense->expense_date); ?></td>

                                    <td>
                                        <a href="<?php echo e(route('admin.accounting.expenses.edit', $expense->id)); ?>">
                                            <i class="fa fa-edit" title="Edit"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.accounting.expenses.destroy', $expense->id)); ?>" method="POST">
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/accounting/expenses/index.blade.php ENDPATH**/ ?>