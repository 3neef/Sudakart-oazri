
<?php $__env->startSection('title', __('adminBody.PENDING_CATEGORIES_LIST')); ?>
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

                    <?php if(auth()->user()->userable_type == 'App\Models\Vendor'): ?>
                        
                    <a href="<?php echo e(route('admin.vendors.pending.categories.request')); ?>" class="btn btn-primary add-row mt-md-0 mt-2">
                        <?php echo e(__('adminBody.NEW_Category')); ?>

                    </a>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('adminBody.shop_name')); ?></th>
                                    <th><?php echo e(__('adminBody.Image')); ?></th>
                                    <th><?php echo e(__('adminBody.Name')); ?></th>
                                    <th><?php echo e(__('adminDash.reason')); ?></th>
                                    <th><?php echo e(__('adminBody.Create_Date')); ?></th>
                                    <th><?php echo e(__('adminBody.Status')); ?></th>
                                    <th><?php echo e(__('adminBody.option')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td data-field="name"><?php echo e($category->shop ? $category->shop->shop_name : 'oazri'); ?></td>
                                    <td>
                                        <img src="<?php echo e(asset($category->category ? $category->category->image :
                                             'http://88.198.145.31/images/placeholder.png')); ?>"
                                        data-field="image" alt="">
                                    </td>

                                    <td data-field="name"><?php echo e($category->category ? $category->category->en_name : ''); ?></td>

                                    <td data-field="price"><?php echo e($category->reason); ?></td>

                                    <td data-field="price"><?php echo e($category->created_at); ?></td>

                                    <?php if($category->approved == true): ?>
                                    <td class="order-success" data-field="status">
                                        <span>approved</span>
                                    </td>
                                    
                                    <?php else: ?>
                                    <td class="order-cancle" data-field="status">
                                        <span>Pending</span>
                                    </td>
                                        
                                    <?php endif; ?>

                                    <td>
                                        <?php if(auth()->user()->userable_type == 'App\Models\Admin' && $category->approved == false): ?>
                                            
                                        <a href="<?php echo e(route('admin.vendors.pending.approvedcategory', $category->id)); ?>">
                                            <i class="fa fa-check" title="approve"></i>
                                        </a>
                                        <?php endif; ?>

                                        <form action="<?php echo e(route('admin.vendors.pending.destroycategory', $category->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                    <td>no data </td>
                                    </tr>
                                <?php endif; ?>
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/vendors/categories/index.blade.php ENDPATH**/ ?>