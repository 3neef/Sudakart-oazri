
<?php $__env->startSection('content'); ?>

  <!-- breadcrumb start -->
  <div class="breadcrumb-section">
    <div class="container">
        <div class="row" style="padding-top: 20px;">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2><?php echo e(__('body.cart')); ?></h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><?php echo e(__('body.home')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('body.cart')); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

 <!--section start-->
 <section class="cart-section section-b-space">
    <div class="container">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('show-cart')->html();
} elseif ($_instance->childHasBeenRendered('5TTfZ10')) {
    $componentId = $_instance->getRenderedChildComponentId('5TTfZ10');
    $componentTag = $_instance->getRenderedChildComponentTagName('5TTfZ10');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('5TTfZ10');
} else {
    $response = \Livewire\Livewire::mount('show-cart');
    $html = $response->html();
    $_instance->logRenderedChild('5TTfZ10', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</section>
<!--section end-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/main/cart/index.blade.php ENDPATH**/ ?>