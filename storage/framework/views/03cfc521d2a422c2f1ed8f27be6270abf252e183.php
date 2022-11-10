
<?php $__env->startSection('content'); ?>
 <!-- breadcrumb start -->
 <div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2><?php echo e(__('body.search')); ?></h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home.web')); ?>"><?php echo e(__('body.home')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('body.search')); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

  <!-- product section start -->
  <section class="j-box section-b-space ratio_asos">
    <div class="container">
        <div class="row search-product">
            <?php if($results->count() > 0): ?>
            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-sm-6">
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="<?php echo e(route('product.show',$result->id)); ?>"><img src="<?php echo e($result->ProductImages[0]); ?>"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="<?php echo e(route('product.show',$result->id)); ?>"><img src="<?php echo e($result->ProductImages[0]); ?>"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                                <?php if($result->attributes->count() == 0): ?>
                                <form id="add-to-cart-form-no-option-<?php echo e($result->id); ?>" action="<?php echo e(route('cart.addTocart')); ?>" 
                                class="add-to-cart-form-no-option" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="<?php echo e($result->id); ?>">
                                <button class="add-to-cart-no-option" data-id="<?php echo e($result->id); ?>" title="Add to cart">
                                    <i class="ti-shopping-cart"></i>
                                </button>
                                </form>
                                <?php else: ?> 
                                <form action="<?php echo e(route('product.show',$result->id)); ?>" method="get">
                                    <button title="Add to cart">
                                        <i class="ti-shopping-cart"></i>
                                    </button>
                                </form>
                                <?php endif; ?>
                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('add-to-wishlist', ['product_id' => $result->id])->html();
} elseif ($_instance->childHasBeenRendered('lyC3ypI')) {
    $componentId = $_instance->getRenderedChildComponentId('lyC3ypI');
    $componentTag = $_instance->getRenderedChildComponentTagName('lyC3ypI');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('lyC3ypI');
} else {
    $response = \Livewire\Livewire::mount('add-to-wishlist', ['product_id' => $result->id]);
    $html = $response->html();
    $_instance->logRenderedChild('lyC3ypI', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                
                        </div>
                    </div>
                    <div class="product-detail">
                    <div>
                        <a href="<?php echo e(route('product.show',$result->id)); ?>">
                                <h6><?php echo e($result->en_name); ?></h6>
                        </a>
                        </div>
                        <div class="rating">
                            
                            <?php for($i = 0 ;$i < $result->rate ; $i++ ): ?>
                            <i class="fa fa-star"></i>
                            <?php endfor; ?>
                            
                        </div>
                    
                        <h4><?php echo money($result->price,'OMR'); ?></h4>
                    
                        
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?> 
            <h3 class="text-center text-danger"><?php echo e(__('labels.no_result')); ?></h3>
            <?php endif; ?>
           
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <?php echo e($results->links()); ?>

            </div>
        </div>
    </div>
</section>
<!-- product section end -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/main/search.blade.php ENDPATH**/ ?>