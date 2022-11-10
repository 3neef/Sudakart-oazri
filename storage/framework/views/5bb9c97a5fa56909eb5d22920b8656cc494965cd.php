
<?php $__env->startSection('content'); ?>
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2><?php if(app()->getLocale() == 'en'): ?> <?php echo e($category->en_name); ?> <?php else: ?> <?php echo e($category->name); ?> <?php endif; ?></h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home.web')); ?>"><?php echo e(__('body.home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php if(app()->getLocale() == 'en'): ?> <?php echo e($category->en_name); ?> <?php else: ?> <?php echo e($category->name); ?> <?php endif; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->


    <!-- section start -->
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <?php if($products->count() > 0): ?>
                            <div class="row">
                                <div class="col-sm-12">
                                   
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="container-fluid p-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="product-filter-content">
                                                           
                                                            <div class="collection-view">
                                                                <ul>
                                                                    <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                    <li><i class="fa fa-list-ul list-layout-view"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="collection-grid-view">
                                                                <ul>
                                                                    <li><img src="<?php echo e(asset('main/images/icon/2.png')); ?>" alt=""
                                                                            class="product-2-layout-view"></li>
                                                                    <li><img src="<?php echo e(asset('main/images/icon/3.png')); ?>" alt=""
                                                                            class="product-3-layout-view"></li>
                                                                    <li><img src="<?php echo e(asset('main/images/icon/4.png')); ?>" alt=""
                                                                            class="product-4-layout-view"></li>
                                                                    <li><img src="<?php echo e(asset('main/images/icon/6.png')); ?>" alt=""
                                                                            class="product-6-layout-view"></li>
                                                                </ul>
                                                            </div>
                                                            <div class="product-page-per-view">
                                                                <select id="count-category-product-select">
                                                                    <option value=""><?php echo e(__('body.Show_Per_page')); ?></option>
                                                                    <option value="<?php echo e(route('product.category',[$category->id,'limit' => 2])); ?>">24 <?php echo e(__('body.per_page')); ?>

                                                                    </option>
                                                                    <option value="<?php echo e(route('product.category',[$category->id,'limit' => 50])); ?>">50 <?php echo e(__('body.per_page')); ?>

                                                                    </option>
                                                                    <option value="<?php echo e(route('product.category',[$category->id,'limit' => 100])); ?>">100 <?php echo e(__('body.per_page')); ?>

                                                                    </option>
                                                                </select>
                                                            </div>
                                                           
                                                        </div>
                                                        

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                       
                                        <div class="product-wrapper-grid j-box">
                                            <div class="row margin-res" id="product-category-area" data-id="<?php echo e($category->id); ?>">
                                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-xl-3 col-6">
                                                        <div class="product-box-outer">
                                                            <div class="product-box">
                                                                <div class="img-wrapper">
                                                                    <div class="front">
                                                                        <a href="<?php echo e(route('product.show',$product->id)); ?>"><img
                                                                                src="<?php echo e($product->ProductImages ? $product->ProductImages[0] : ''); ?>"
                                                                                class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                                    </div>
                                                                    <div class="back">
                                                                    <a href="<?php echo e(route('product.show',$product->id)); ?>">
                                                                        <img src="<?php echo e($product->ProductImages ? $product->ProductImages[0] : ''); ?>"
                                                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
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
} elseif ($_instance->childHasBeenRendered('P6IP4w2')) {
    $componentId = $_instance->getRenderedChildComponentId('P6IP4w2');
    $componentTag = $_instance->getRenderedChildComponentTagName('P6IP4w2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('P6IP4w2');
} else {
    $response = \Livewire\Livewire::mount('add-to-wishlist', ['product_id' => $product->id]);
    $html = $response->html();
    $_instance->logRenderedChild('P6IP4w2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
                                        </div>
                                      

                                        

                                    </div>
                                </div>
                            </div>
                            <?php else: ?> 
                                <h3 class="text-danger text-center"><?php echo e(__('msg.product_category_empty')); ?></h3>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section End -->
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('main/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/main/category/show.blade.php ENDPATH**/ ?>