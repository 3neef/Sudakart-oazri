
<?php $__env->startSection('content'); ?>
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2><?php echo e(__('body.all_cat')); ?></h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/"><?php echo e(__('body.home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('body.all_cat')); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container mb-3 mt-3">
    <h3 class="text-center mb-3"><?php echo e(__('body.all_cat')); ?></h3>
    <div class="row">
        
        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-lg-3 col-sm-6">
                <div class="category-box">
                    <div class="category-image">
                        <a href="<?php echo e(route('product.category',$category->id)); ?>">
                            <img src="<?php echo e($category->image); ?>" class="lazyload" />
                        </a>
                    </div> 
                    <div class="category-desc">
                        <h4><?php if(app()->getLocale() == 'en'): ?> <?php echo e($category->en_name); ?> <?php else: ?> <?php echo e($category->name); ?> <?php endif; ?></h4>
                        <h5><?php echo e(__('body.products')); ?> : (<?php echo e($category->products->count()); ?>)</h5>
                    </div>
                </div>
            </div>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>  
        <h3 class="text-danger text-center"><?php echo e(__('body.no_categoy')); ?></h3>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-lg-12 mt-3">
            <?php echo e($categories->links()); ?>

        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('main/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/main/category/index.blade.php ENDPATH**/ ?>