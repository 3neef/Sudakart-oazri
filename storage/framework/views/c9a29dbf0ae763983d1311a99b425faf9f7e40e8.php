
<?php $__env->startSection('title', __('adminBody.Blogs')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">

                   
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="all-package coupon-table table table-striped">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('adminBody.shop_name')); ?></th>
                                    <th><?php echo e(__('adminBody.blog_title')); ?></th>
                                    <th><?php echo e(__('adminBody.content')); ?></th>
                                    <th><?php echo e(__('adminBody.Created_On')); ?></th>
                                    <th><?php echo e(__('adminBody.views')); ?></th>
                                    <th><?php echo e(__('adminBody.Approved')); ?></th>
                                   
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-row-id="1">
                                    <?php if(app()->getLocale() == 'en'): ?>
                                    <td><?php echo e($article->shop ? $article->shop->shop_en_name : 'admin'); ?></td>
                                    
                                    <?php else: ?>
                                    <td><?php echo e($article->shop ? $article->shop->shop_name : 'المشرف'); ?></td>
                                        
                                    <?php endif; ?>
                                    <td><?php echo e($article->title); ?> </td>
                                    <td> <?php echo Str::limit($article->content, 20); ?></td>
                                    <td class="list-date"> <?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($article->created_at))->format('d-m-Y')); ?>

                                    </td>
                                    <td><?php echo e($article->views); ?></td>
                                    <?php if($article->approved == true): ?>
                                        <td class="td-check">
                                            <i data-feather="check-circle"></i>
                                        </td>
                                            
                                        <?php else: ?>
                                            
                                        <td class="td-cross">
                                            <i data-feather="x-circle"></i>
                                        </td>
                                        <?php endif; ?>
                                       
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/analytics/mostviewedBlogs.blade.php ENDPATH**/ ?>