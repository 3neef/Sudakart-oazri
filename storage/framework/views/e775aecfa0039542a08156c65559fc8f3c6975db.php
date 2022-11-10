
<?php $__env->startSection('content'); ?>
<!--section start-->
<section class="blog-detail-page section-b-space ratio2_3">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 blog-detail">
                
                <h3><?php echo e($article->title); ?></h3>
                <ul class="post-social">
                    <li><?php echo e(date_format($article->created_at,'D M Y')); ?></li>
                    <li><?php echo e(__('body.Posted_By')); ?> : <?php if($article->shop): ?> <?php echo e($article->shop->shop_name); ?><?php endif; ?></li>
                    <li><i class="fa fa-comments"></i> <?php echo e($article->comments->count()); ?> <?php echo e(__('body.comment')); ?></li>
                </ul>
                <p style="font-size:18px; word-break:break-all;"><?php echo e($article->content); ?></p>
               
            </div>
        </div>
        <?php if($article->products->count() > 0): ?>
        <h3 class="mt-3"><?php echo e(__('body.tagged_products')); ?></h3>
        <hr>
        <div class="row j-box">
            <?php $__currentLoopData = $article->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4">
                <div class="product-box-outer">
                    <div class="product-box">
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="<?php echo e(route('product.show',$product->id)); ?>"><img
                                        src="<?php echo e($product->ProductImages[0]); ?>"
                                        class="img-fluid blur-up lazyload bg-img m-0" alt=""></a>
                            </div>
                             <div class="back">
                            <a href="<?php echo e(route('product.show',$product->id)); ?>"><img src="<?php echo e($product->ProductImages[0]); ?>"
                                    class="img-fluid blur-up lazyload bg-img m-0" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                        <?php if($product->attributes->count() == 0): ?>
                        <form id="add-to-cart-form-no-option-<?php echo e($product->id); ?>" action="<?php echo e(route('cart.addTocart')); ?>" 
                        class="add-to-cart-form-no-option" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                        <button class="add-to-cart-no-option" data-id="<?php echo e($product->id); ?>" title="Add to cart">
                            <i class="ti-shopping-cart"></i>
                        </button>
                        </form>
                        <?php else: ?> 
                    
                        <form action="<?php echo e(route('product.show',$product->id)); ?>" method="get">
                            <button title="Add to cart">
                                <i class="ti-shopping-cart"></i>
                            </button>
                        </form>
                    
                        <?php endif; ?>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('add-to-wishlist', ['product_id' => $product->id])->html();
} elseif ($_instance->childHasBeenRendered('GUYdqAL')) {
    $componentId = $_instance->getRenderedChildComponentId('GUYdqAL');
    $componentTag = $_instance->getRenderedChildComponentTagName('GUYdqAL');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('GUYdqAL');
} else {
    $response = \Livewire\Livewire::mount('add-to-wishlist', ['product_id' => $product->id]);
    $html = $response->html();
    $_instance->logRenderedChild('GUYdqAL', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                            
                        </div>
                        </div>
                        <div class="product-detail">
                        <div>
                            <a href="<?php echo e(route('product.show',$product->id)); ?>">
                                <h6><?php echo e($product->en_name); ?></h6>
                            </a>
                        </div>
                        <div class="rating">
                            
                            <?php for($i = 0 ;$i < $product->rate ; $i++ ): ?>
                            <i class="fa fa-star"></i>
                            <?php endfor; ?>
                            
                        </div>
                    
                        <h4><?php echo money($product->price,'OMR'); ?></h4>
                        </div>
                </div>
                </div>
              
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('article-comments', ['article' => $article])->html();
} elseif ($_instance->childHasBeenRendered($article->id)) {
    $componentId = $_instance->getRenderedChildComponentId($article->id);
    $componentTag = $_instance->getRenderedChildComponentTagName($article->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($article->id);
} else {
    $response = \Livewire\Livewire::mount('article-comments', ['article' => $article]);
    $html = $response->html();
    $_instance->logRenderedChild($article->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        
   
</section>
<!--Section ends-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/main/blog/show.blade.php ENDPATH**/ ?>