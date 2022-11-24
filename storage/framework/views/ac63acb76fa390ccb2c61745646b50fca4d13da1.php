
<?php $__env->startSection('title', __('adminBody.blog_show')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <section class="blog-detail-page section-b-space ratio2_3">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 blog-detail">
                                <h3><?php echo e($article->title); ?></h3>
                                <ul class="post-social">
                                    <li><?php echo e($article->created_at); ?></li>
                                    <li>Posted By :<?php echo e($article->shop->shop_name); ?></li>
                                    <li><i class="fa fa-heart"></i> <?php echo e($article->views); ?> Hits</li>
                                    <li><i class="fa fa-comments"></i> <?php echo e($article->comments->count()); ?> Comments</li>
                                </ul>
                                <p><?php echo $article->content; ?></p>
                            </div>
                        </div>
                        <div class="row section-b-space">
                            <div class="col-sm-12">
                                <ul class="comment-section">
                                    <li>
                                        <?php $__empty_1 = true; $__currentLoopData = $article->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
                                        <div class="media mt-4 mb-4"><img src="<?php echo e(asset('images/arab.png')); ?>" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h6><?php echo e($comment->user->userable->name); ?> <span>( <?php echo e($comment->created_at); ?>)</span></h6>
                                                <p><?php echo $comment->comment; ?></p>
                                            </div>
                                        </div>
                                            
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <p>No comments</p>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" />

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/promotions/blogs/show.blade.php ENDPATH**/ ?>