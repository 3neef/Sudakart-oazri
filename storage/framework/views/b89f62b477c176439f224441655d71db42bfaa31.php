
<?php $__env->startSection('content'); ?>
 <!-- breadcrumb start -->
 <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2><?php echo e(__('body.wishlist')); ?></h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home.web')); ?>"><?php echo e(__('body.home')); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo e(__('body.wishlist')); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('show-wishlist')->html();
} elseif ($_instance->childHasBeenRendered('tbwDu10')) {
    $componentId = $_instance->getRenderedChildComponentId('tbwDu10');
    $componentTag = $_instance->getRenderedChildComponentTagName('tbwDu10');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('tbwDu10');
} else {
    $response = \Livewire\Livewire::mount('show-wishlist');
    $html = $response->html();
    $_instance->logRenderedChild('tbwDu10', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('main/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/main/wishlist/index.blade.php ENDPATH**/ ?>