
<?php $__env->startSection('content'); ?>
<div class="p-0">
<div class="container-fluid">
<div class="row">

    <div class="col-lg-3 left-side"><!-- left area -->
        <div id="shopify-section-left-col-banner" class="shopify-section">
            <div class="widget bottom-to-top hb-animate-element hb-in-viewport">
            <div class="img_banner"><img src="<?php echo e(asset('main/images/banners/left-banner.jpg')); ?>" alt="left_banner">
                <div class="title" style="color:#000000">google pixel</div>
                <div class="subtitle" style="color:#000000">get up to 30% off</div>
            </div>
            </div>
        </div>

        <div id="shopify-section-left-col-testimonial" class="shopify-section">
            <div class="widget ttleft-testimonial-wrap bottom-to-top hb-animate-element mt-3" style="background:#ffffff; margin-bottom:20px">
                <h4 class="widget-title" style="color:#000000"><?php echo e(__('body.testimonials')); ?></h4>  
                <div class="tttestimonial-wrap" style="">
                <div class="tttestimonial-inner">
                <div class="grid__item testimonials_wrap owl-carousel owl-loaded owl-drag">                 
                
                    <div class="owl-stage-outer">
                    <div class="owl-stage">

                        <div class="owl-item">
                            <div class="testimonial-block testimonial-content">
                            <div class="testimonial-image">
                                <img src="<?php echo e(asset('main/images/banners/user1.jpg')); ?>" alt="testimonial-image">
                            </div>
                            <div class="testimonial-title">
                                <div class="testimonial-user-title" style="color:#000000">
                                <h5>john doe</h5>
                                </div>
                                <div class="testimonial-user-desc" style="color:#888888"><span>web designer</span></div>
                            </div>
                            <div class="testimonial-content-desc" style="color:#666666"> 
                                <p>Duis faucibus enim vitae nunc molestie, nec facilisis arcu pulvinar nullam mattis..</p>
                        
                
                            </div>
                            </div>
                        </div>
                        <div class="owl-item">
                        <div class="testimonial-block testimonial-content">
                        <div class="testimonial-image">
                            <img src="<?php echo e(asset('main/images/banners/user2.jpg')); ?>" alt="testimonial-image">
                        </div>
                        <div class="testimonial-title">
                            <div class="testimonial-user-title" style="color:#000000">
                            <h5>john doe</h5>
                            </div>
                            <div class="testimonial-user-desc" style="color:#888888"><span>web designer</span></div>
                        </div>
                        <div class="testimonial-content-desc" style="color:#666666"> 
                            <p>Duis faucibus enim vitae nunc molestie, nec facilisis arcu pulvinar nullam mattis..</p>
                    
            
                        </div>
                        </div>
                    </div>

                    <div class="owl-item">
                    <div class="testimonial-block testimonial-content">
                    <div class="testimonial-image">
                        <img src="<?php echo e(asset('main/images/banners/user3.jpg')); ?>" alt="testimonial-image">
                    </div>
                    <div class="testimonial-title">
                        <div class="testimonial-user-title" style="color:#000000">
                        <h5>john doe</h5>
                        </div>
                        <div class="testimonial-user-desc" style="color:#888888"><span>web designer</span></div>
                    </div>
                    <div class="testimonial-content-desc" style="color:#666666"> 
                        <p>Duis faucibus enim vitae nunc molestie, nec facilisis arcu pulvinar nullam mattis..</p>
                
        
                    </div>
                    </div>
                </div>

                        </div>
                    </div>
                    <div class="owl-nav">
                        <div class="owl-prev">prev</div>
                        <div class="owl-next">next</div>
                    </div>
                    
                </div>
                </div>
            </div> 
            </div>    
        </div>

        <div class="left-side-best-seller card mt-2 p-1">
            <div class="card-header" style="border: none;">
                <div class="header-title">
                    <?php echo e(__('body.best-seller-title')); ?>

                </div>
            </div>
            <div class="card-body">
                <?php $__currentLoopData = $bestSeller; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="best-seller-left-product">
                    <div class="image-wrap">
                          <a href="<?php echo e(route('product.show',$product->id)); ?>">
                            <img src="<?php echo e($product->ProductImages[0]); ?>" alt="">
                          </a>
                    </div>
                    <div class="product-info-left-seller" style="display: flex; flex-direction:column;">
                         <div class="product-name mb-2">
                            <a href="<?php echo e(route('product.show',$product->id)); ?>">
                              <?php if(app()->getLocale() == 'en'): ?>
                                 <?php echo e($product->en_name); ?>

                              <?php else: ?> 
                                 <?php echo e($product->name); ?>

                              <?php endif; ?>
                            </a>
                         </div>
                         <div class="rating" style="heigth:20px;">
                            <?php for($i = 0 ; $i < \App\Models\Product::getRateById($product->id) ; $i++): ?>
                            <i style="color: #ffa200;" class="fa fa-star"></i>
                            <?php endfor; ?>
                         </div>
                         <div class="product-price-details">
                              <span><?php echo money($product->price,'OMR'); ?></span>
                              <span></span>
                              <span></span>
                         </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>


        <div class="left-side-best-seller card mt-2 p-1">
            <div class="card-header" style="border: none;">
                <div class="header-title">
                    <?php echo e(__('body.new_products')); ?>

                </div>
            </div>
            <div class="card-body">
                <?php $__currentLoopData = $latestProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="best-seller-left-product">
                    <div class="image-wrap">
                          <a href="<?php echo e(route('product.show',$product->id)); ?>">
                            <img src="<?php echo e($product->ProductImages[0]); ?>" alt="">
                          </a>
                    </div>
                    <div class="product-info-left-seller" style="display: flex; flex-direction:column;">
                         <div class="product-name mb-2">
                            <a href="<?php echo e(route('product.show',$product->id)); ?>">
                              <?php if(app()->getLocale() == 'en'): ?>
                                 <?php echo e($product->en_name); ?>

                              <?php else: ?> 
                                 <?php echo e($product->name); ?>

                              <?php endif; ?>
                            </a>
                         </div>
                         <div class="rating" style="heigth:20px;">
                            <?php for($i = 0 ; $i < \App\Models\Product::getRateById($product->id) ; $i++): ?>
                            <i style="color: #ffa200;" class="fa fa-star"></i>
                            <?php endfor; ?>
                         </div>
                         <div class="product-price-details">
                              <span><?php echo money($product->price,'OMR'); ?></span>
                              <span></span>
                              <span></span>
                         </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>

        

    </div><!-- left area end -->
    <div class="col-lg-9 right-side"><!-- right area -->
        <div  class="swiper-section mb-3 top-slider " style="background-color: #eee; border-radius:1rem;">
            <div class="swiper swiper-best-slideshow">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                        <a href="<?php echo e(route('product.show',$slider->product_id)); ?>">
                            <img src="<?php echo e(asset($slider->image)); ?>" class="top-slider-image" style="width:100%;">
                        </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    
                        
                    </div>
                    <!-- If we need pagination -->
                    

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                    <!-- If we need scrollbar -->
                    
                    </div>
        </div>

        <div  class="shopify-section index-section services col-xs-12">  
            <div id="ttcmsservices" class="col-sm-11 bottom-to-top hb-animate-element hb-in-viewport">
                
                <div class="block_content owl-carousel owl-loaded owl-drag mb-3" style="display: block;">
                
                <div class="owl-stage-outer">
                <div class="owl-stage">
                    
                    <div class="owl-item">
                    <div class="ttservice-wrap">
                        <div class="ttcontent">
                        <div class="service">
                            <div class="ttshipping_img service-icon">
                            <img src="<?php echo e(asset('main/images/shipping/01_74aa4357-58cc-402c-8dbd-7505e2304cc5.png')); ?>" alt="services">
                            </div>
                            <div class="content">
                            <div class="service-title"><?php echo e(__('body.free_shipping')); ?></div>
                            <div class="service-desc"><?php echo e(__('body.delivery_worldwide')); ?></div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                    <div class="owl-item">
                    <div class="ttservice-wrap">
                        <div class="ttcontent">
                        <div class="service">
                            <div class="ttshipping_img service-icon">
                            <img src="<?php echo e(asset('main/images/shipping/02_84107599-78f8-4eb9-85e5-3f1554a919b7.png')); ?>" alt="services">
                            </div>
                            <div class="content">
                            <div class="service-title"><?php echo e(__('body.return_exchange')); ?></div>
                            <div class="service-desc"><?php echo e(__('body.return_exchange_20')); ?></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="owl-item">
                    <div class="ttservice-wrap">
                        <div class="ttcontent">
                        <div class="service">
                            <div class="ttshipping_img service-icon">
                            <img src="<?php echo e(asset('main/images/shipping/03_b8e290a7-f0de-4dce-b2ec-895e247da8f4.png')); ?>" alt="services">
                            </div>
                            <div class="content">
                            <div class="service-title"><?php echo e(__('body.quality_support')); ?></div>
                            <div class="service-desc"><?php echo e(__('body.quality_support_24')); ?></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="owl-item">
                        <div class="ttservice-wrap">
                        <div class="ttcontent">
                        <div class="service">
                            <div class="ttshipping_img service-icon">
                            <img src="<?php echo e(asset('main/images/shipping/04_47fd1441-cf46-49af-82eb-04c477967e5f.png')); ?>" alt="services">
                            </div>
                            <div class="content">
                            <div class="service-title"><?php echo e(__('body.safe_shopping')); ?></div>
                            <div class="service-desc"><?php echo e(__('body.genuine')); ?></div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                
                </div>
                    <div class="owl-nav disabled">
                        <div class="owl-prev disabled">prev</div>
                        <div class="owl-next disabled">next</div>
                    </div>
                    <div class="owl-dots disabled">
                        <div class="owl-dot active">
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        
        <style>
            .ttservice-wrap .service-title{
                    color: #000000;
            }
            .ttservice-wrap .service-desc{
                    color: #666666;
            }
                #ttcmsservices .ttservice-wrap:hover .content .service-title {
                color: #ed1e3c;
            }
        </style>
        
        
        
        
        
        </div>
    </div>

  
<section class="pt-0 j-box ratio_square p-0">
<div class="container-fluid p-0">
<div class="row">
    <div class="col">
        <div class="theme-tab">
            <div class="product-slider-filter-header mb-3">
                <div class="best-seller-title-one">
                    <?php echo e(__('body.best-seller-title')); ?>

                </div>
                <ul id="tabs-ul-li" class="tabs tab-title m-0">
                <li class="current">
                    <a href="tab-4"><?php echo e(__('body.new_products')); ?></a>
                </li>
                <li class="">
                    <a href="tab-5"><?php echo e(__('body.featured_products')); ?></a>
                </li>
                <li class="">
                    <a href="tab-6"><?php echo e(__('body.best-seller-title')); ?></a>
                </li>
            </ul>
                <div class="best-seller-filters">
                
                <div class="customNavigation" style="position: relative; top: auto ; right: auto;">
                    <div class="d-flex">
                        <a class="mdi mdi-arrow-left seller_prev prev">Prev</a>
                        <a class="mdi mdi-arrow-right seller_next next">Next</a>
                    </div>
                </div>
            </div>
            </div>
            
            <div class="tab-content-cls">

        <div id="tab-4" class="tab-content active default">
            <div class="tab-owl-ca owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        <?php $__currentLoopData = $latestProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="owl-item">
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
                                            <button class="add-to-cart-no-option" data-id="<?php echo e($product->id); ?>" title="<?php echo e(__('body.add_to_cart')); ?>">
                                                <i class="ti-shopping-cart"></i>
                                            </button>
                                            </form>
                                            <?php else: ?> 
                                            <form action="<?php echo e(route('product.show',$product->id)); ?>" method="get">
                                                <button title="<?php echo e(__('body.add_to_cart')); ?>">
                                                    <i class="ti-shopping-cart"></i>
                                                </button>
                                            </form>
                                            <?php endif; ?>
                                            
                                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('add-to-wishlist', ['product_id' => $product->id])->html();
} elseif ($_instance->childHasBeenRendered('qdHwoOw')) {
    $componentId = $_instance->getRenderedChildComponentId('qdHwoOw');
    $componentTag = $_instance->getRenderedChildComponentTagName('qdHwoOw');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qdHwoOw');
} else {
    $response = \Livewire\Livewire::mount('add-to-wishlist', ['product_id' => $product->id]);
    $html = $response->html();
    $_instance->logRenderedChild('qdHwoOw', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                           
                                           
                                        </div>
                                    </div>
                                    <div class="product-detail" style="display: flex; flex-direction:column">
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
                        </div><!-- owl-item-1-tab-4 -->
                       

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        

                    </div>
                </div>


            </div><!-- owl-tab-tab-5 -->
        </div>
                            <div id="tab-5" class="tab-content">

                                <div class="tab-owl-ca owl-carousel owl-theme owl-loaded">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage">
                                        
                                            <?php $__currentLoopData = $favs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="owl-item">
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
                                                                <button class="add-to-cart-no-option" data-id="<?php echo e($product->id); ?>" title="<?php echo e(__('body.add_to_cart')); ?>">
                                                                    <i class="ti-shopping-cart"></i>
                                                                </button>
                                                                </form>
                                                                <?php else: ?> 
                                                                <form action="<?php echo e(route('product.show',$product->id)); ?>" method="get">
                                                                    <button title="<?php echo e(__('body.add_to_cart')); ?>">
                                                                        <i class="ti-shopping-cart"></i>
                                                                    </button>
                                                                </form>
                                                                <?php endif; ?>
                                                                
                                                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('add-to-wishlist', ['product_id' => $product->id])->html();
} elseif ($_instance->childHasBeenRendered('S4GnXX5')) {
    $componentId = $_instance->getRenderedChildComponentId('S4GnXX5');
    $componentTag = $_instance->getRenderedChildComponentTagName('S4GnXX5');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('S4GnXX5');
} else {
    $response = \Livewire\Livewire::mount('add-to-wishlist', ['product_id' => $product->id]);
    $html = $response->html();
    $_instance->logRenderedChild('S4GnXX5', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                                                
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="product-detail" style="display: flex; flex-direction:column">
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
                                            </div><!-- owl-item-1-tab-4 -->
                                           
                    
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            

                                        </div>
                                    </div>
                                </div><!-- owl-tab-tab-5 -->

                            </div>
                            
                    <div id="tab-6" class="tab-content">
                        <div class="tab-owl-ca owl-carousel owl-theme owl-loaded">
                            <div class="owl-stage-outer">
                                <div class="owl-stage">

                                <?php $__currentLoopData = $bestSeller; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="owl-item">
                                        <div class="product-box-outer">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="<?php echo e(route('product.show',$product->id)); ?>"><img
                                                                src="<?php echo e($product->ProductImages ? $product->ProductImages[0] : ''); ?>"
                                                                class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                    </div>
                                                    <div class="back">
                                                    <a href="<?php echo e(route('product.show',$product->id)); ?>"><img src="<?php echo e($product->ProductImages ? $product->ProductImages[0] : ''); ?>"
                                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                </div>
                                                    <div class="cart-info cart-wrap">
                                                        <?php if($product->attributes->count() == 0): ?>
                                                        <form id="add-to-cart-form-no-option-<?php echo e($product->id); ?>" action="<?php echo e(route('cart.addTocart')); ?>" 
                                                        class="add-to-cart-form-no-option" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                                        <button class="add-to-cart-no-option" data-id="<?php echo e($product->id); ?>" title="<?php echo e(__('body.add_to_cart')); ?>">
                                                            <i class="ti-shopping-cart"></i>
                                                        </button>
                                                        </form>
                                                        <?php else: ?> 
                                                       
                                                        <form action="<?php echo e(route('product.show',$product->id)); ?>" method="get">
                                                            <button title="<?php echo e(__('body.add_to_cart')); ?>">
                                                                <i class="ti-shopping-cart"></i>
                                                            </button>
                                                        </form>
                                                       
                                                        <?php endif; ?>
                                                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('add-to-wishlist', ['product_id' => $product->id])->html();
} elseif ($_instance->childHasBeenRendered('flIuBpz')) {
    $componentId = $_instance->getRenderedChildComponentId('flIuBpz');
    $componentTag = $_instance->getRenderedChildComponentTagName('flIuBpz');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('flIuBpz');
} else {
    $response = \Livewire\Livewire::mount('add-to-wishlist', ['product_id' => $product->id]);
    $html = $response->html();
    $_instance->logRenderedChild('flIuBpz', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                                        
                                                       
                                                    </div>
                                                </div>
                                                <div class="product-detail" style="display: flex; flex-direction:column">
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
                                    </div><!-- owl-item-1-tab-4 -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    


                                </div>
                            </div>
                        </div><!-- owl-tab-tab-5 -->

                    </div>

                
                
                </div>
            </div>
        </div>
    </div>
</div>
</section>


    <div class="discount-area mb-3 mt-3">
        <div class="row">
            <div class="ttbanner-img1 ttbanner col-sm-6 col-xs-6 mb-3">
                <a href="#">
                <img alt="banner-01.jpg" src="<?php echo e(asset('main/images/banner-01.jpg')); ?>">
                </a>
            </div>
            <div class="ttbanner-img2 ttbanner col-sm-6 col-xs-6 mb-3">
                <a href="#">
                <img alt="banner-02.jpg" src="<?php echo e(asset('main/images/banner-02.jpg')); ?>">
                </a>
            </div>
        </div>
    </div>


<!-- start here -->
    <?php if($specials->count() > 0): ?>
    <div id="shopify-section-1523521292230" class="shopify-section index-section">
    <div class="collection-product">
        <div class="page-width slider-newproduct-wrap bottom-to-top hb-animate-element hb-in-viewport" style="float:left;width:100%;background-color:rgba(0,0,0,0);">
            <div class="section-header">
            <h2 class="tt-title"><?php echo e(__('body.Specials')); ?></h2>
            </div>
            <div class="row">
            <div class="new-product-divnewproduct mb-3">
                <div id="specials_owl" class="slider-newproduct specials grid grid--view-items owl-carousel owl-theme owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">

                        <?php $__empty_1 = true; $__currentLoopData = $specials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $special): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="owl-item mb-2">
                            <div class="product-li">
                                <div  class="item-row style1 product-layouts item-row grid-view-item">
                                    <div class="product-wrapper imgloaded">
                                    <div class="thumbs product-thumb">
                                        <div class="col-xs-12 padding_0 zoom_img">
                                            <a class="grid-view-item__link" href="<?php echo e(route('product.show',$special->product_id)); ?>">
                                            <img class="image_thumb_swap" src="<?php echo e(\App\Models\Product::getImageBy($special->product_id)); ?>" alt="">
                                            <img class="grid-view-item__image featured-image image_thumb" src="<?php echo e(\App\Models\Product::getImageBy($special->product_id)); ?>" alt="">
                                            
                                            </a> 
                                            <div class="loader">
                                                <div class="preloader-wrapper active">
                                                <div class="spinner-layer"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="main_btn_wrapper">
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <div class="product-description">
                                        <div class="product-description-wrap">
                                            <div class="h4 grid-view-item__title">
                                                <a class="grid-view-item__link grid-link__title"
                                                href="<?php echo e(route('product.show',$special->product_id)); ?>">
                                                <?php if(app()->getLocale() == 'en'): ?><?php echo e($special->product_en_name); ?>

                                                <?php else: ?> <?php echo e($special->product_name); ?>

                                                <?php endif; ?>
                                                </a>
                                            </div>
                                            
                                            <div class="grid-view-item__meta">
                                                <div class="grid-link__org_price">
                                                <!-- snippet/product-price.liquid -->
                                                <span class="visually-hidden">Regular price</span>    
                                                <span class="product-price__price product-price__sale">
                                                <span class="money"><?php echo money($special->price - ($special->price * $special->discount),'OMR'); ?></span>
                                                </span>
                                                <span class="discount-percentage"><?php echo e($special->discount * 100); ?>%</span>
                                                <s class="product-price__price compare_price"><span class="money"><?php echo money($special->price,'OMR'); ?></span></s>
                                                </div>
                                            </div>
                                            <div class="product-desc rte" style="height: 83px; overflow:hidden; margin-bottom:10px;"><?php if(app()->getLocale() == 'en'): ?><?php echo e($special->product_en_discription); ?> <?php else: ?> <?php echo e($special->product_discription); ?> <?php endif; ?></div>
                                            <div class="flip-countdown simple-countdown">
                                                <div class="countdown-container flip-countdown" data-countdown="2020/08/09"></div>
                                            </div>
                                            <div class="btn_wrapper">
                                                <div class="pro_btn add_tocart">
                                                
                                                <form id="add-to-cart-form-no-option-<?php echo e($special->product_id); ?>" action="<?php echo e(route('cart.addTocart')); ?>" 
                                                class="add-to-cart-form-no-option" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="product_id" value="<?php echo e($special->product_id); ?>">
                                                
                                                <button class="btn add-to-cart-no-option" style="width: auto;
                                                padding: 0 13px 0 37px;
                                                -webkit-border-radius: 25px;
                                                -moz-border-radius: 25px;
                                                -khtml-border-radius: 25px;
                                                border-radius: 25px;
                                                z-index: 1;" data-id="<?php echo e($special->product_id); ?>" title="<?php echo e(__('body.add_to_cart')); ?>">
                                                    <i style="color:#fff;" class="mdi mdi-cart-outline"></i><span class="add_cart"><?php echo e(__('body.add_to_cart')); ?></span>
                                                </button>
                                                </form>
                                                
                                        
                                                </div>
                                                <div class="add-to-wishlist pro_btn">
                                                <div class="show">
                                                    <div class="default-wishbutton-aliquam-quaerat-voluptatem-8 loading">
                                                        <a class="add-in-wishlist-js btn">
                                                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('add-to-wishlist', ['product_id' => $special->product_id,'style' => 'color : white; margin-top:10px;'])->html();
} elseif ($_instance->childHasBeenRendered('fuNKejO')) {
    $componentId = $_instance->getRenderedChildComponentId('fuNKejO');
    $componentTag = $_instance->getRenderedChildComponentTagName('fuNKejO');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('fuNKejO');
} else {
    $response = \Livewire\Livewire::mount('add-to-wishlist', ['product_id' => $special->product_id,'style' => 'color : white; margin-top:10px;']);
    $html = $response->html();
    $_instance->logRenderedChild('fuNKejO', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                                        <span class="tooltip-label">Wishlist</span>
                                                        </a></div>
                                                </div>
                                                </div>
                                            
                                            
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                        
                        
                        </div><!-- stage -->
                    </div>
                    <div class="owl-nav">
                        <div class="owl-prev disabled">prev</div>
                        <div class="owl-next">next</div>
                    </div>
                    <div class="owl-dots disabled"></div>
                </div>
                <div class="customNavigation" style="top : -48px; <?php if(app()->getLocale() == 'ar'): ?> right:auto; left : 30px; <?php endif; ?>">
                    <div class="navigation_wrap">
                        <a class="mdi mdi-arrow-left special_prev prev">Prev</a>
                        <a class="mdi mdi-arrow-right special_next next">Next</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
    <?php endif; ?>
<!-- end here -->


<!-- deal of the day -->

<?php if($dealOfTheDay->count() > 0): ?>
<div class="row mb-3 p-3">
  <div class="col-lg-2" style="background-color:red;"></div>
  <div class="col-lg-8">
            <div class="page-width slider-newproduct-wrap bottom-to-top hb-animate-element hb-in-viewport" style="float:left;width:100%;background-color:rgba(0,0,0,0);">
               <div class="section-header">
                  <h2 class="tt-title"><?php echo e(__('body.deals_of_the_day')); ?></h2>
               </div>
               <div class="row">
                  
                     <div id="deal-of-the-day" class="deal-of-the-day slider-newproduct grid grid--view-items owl-carousel owl-theme owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                           <div class="owl-stage">

                              <?php $__empty_1 = true; $__currentLoopData = $dealOfTheDay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                              <div class="owl-item">
                                 <div class="product-li">
                                    <div  class="item-row style1 product-layouts item-row grid-view-item">
                                       <div class="product-wrapper imgloaded">
                                          <div class="thumbs product-thumb">
                                             <div class="col-xs-12 padding_0 zoom_img">
                                                <a class="grid-view-item__link" href="<?php echo e(route('product.show',$pro->product_id)); ?>">
                                                <img class="image_thumb_swap" src="<?php echo e(\App\Models\Product::getImageBy($pro->product_id)); ?>" alt="">
                                                <img class="grid-view-item__image featured-image image_thumb" src="<?php echo e(\App\Models\Product::getImageBy($pro->product_id)); ?>" alt="">
                                               
                                                </a> 
                                                <div class="loader">
                                                   <div class="preloader-wrapper active">
                                                      <div class="spinner-layer"></div>
                                                   </div>
                                                </div>
                                               
                                                <div class="main_btn_wrapper">
                                                </div>
                                             </div>
                                          
                                          </div>
                                          <div class="product-description">
                                             <div class="product-description-wrap">
                                                <div class="h4 grid-view-item__title">
                                                   <a class="grid-view-item__link grid-link__title" href="<?php echo e(route('product.show',$pro->product_id)); ?>"><?php if(app()->getLocale() == 'en'): ?><?php echo e($pro->product_en_name); ?> <?php else: ?> <?php echo e($pro->product_name); ?><?php endif; ?></a>
                                                </div>
                                                
                                                <div class="grid-view-item__meta mb-3 mt-3">
                                                  <div class="grid-link__org_price">
                                                     <!-- snippet/product-price.liquid -->
                                                     <span class="visually-hidden">Regular price</span>    
                                                     <span class="product-price__price product-price__sale">
                                                     <span style="font-size: 18px;" class="money"><?php echo money($pro->price - ($pro->price * $pro->discount),'OMR'); ?></span>
                                                     </span>
                                                     <span style="font-size: 18px;" class="discount-percentage"><?php echo e($pro->discount * 100); ?>%</span>
                                                     <s  class="product-price__price compare_price"><span style="font-size: 18px;" class="money"><?php echo money($pro->price,'OMR'); ?></span></s>
                                                  </div>
                                               </div>
                                                
                                               
                                                  
                                                  <div class="myProgress">
                                                    <div class="myBar"></div>
                                                  </div>
                                               </div>
                                             
                                               <div class="btn_wrapper mt-3" style="display: flex; flex-direction:row;">
                                                
                                                <div class="pro_btn add_tocart">
                                                  
                                                   <form id="add-to-cart-form-no-option-<?php echo e($pro->product_id); ?>" action="<?php echo e(route('cart.addTocart')); ?>" 
                                                   class="add-to-cart-form-no-option" method="post">
                                                   <?php echo csrf_field(); ?>
                                                   <input type="hidden" name="product_id" value="<?php echo e($pro->product_id); ?>">
                                                
                                                   <button class="btn add-to-cart-no-option" style="width: auto;
                                                   padding: 0 13px 0 37px;
                                                   -webkit-border-radius: 25px;
                                                   -moz-border-radius: 25px;
                                                   -khtml-border-radius: 25px;
                                                   border-radius: 25px;
                                                   z-index: 1;" data-id="<?php echo e($pro->product_id); ?>" title="<?php echo e(__('body,add_to_cart')); ?>">
                                                       <i style="color:#fff;" class="mdi mdi-cart-outline"></i><span class="add_cart"><?php echo e(__('body.add_to_cart')); ?></span>
                                                   </button>
                                                   </form>
                                                  
                                          
                                                </div>
                                                <div class="add-to-wishlist pro_btn">
                                                   <div class="show">
                                                      <div class="default-wishbutton-aliquam-quaerat-voluptatem-8 loading">
                                                        <a class="add-in-wishlist-js btn">
                                                          <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('add-to-wishlist', ['product_id' => $pro->product_id,'style' => 'color : white; margin-top:10px;'])->html();
} elseif ($_instance->childHasBeenRendered('mjxJJUc')) {
    $componentId = $_instance->getRenderedChildComponentId('mjxJJUc');
    $componentTag = $_instance->getRenderedChildComponentTagName('mjxJJUc');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('mjxJJUc');
} else {
    $response = \Livewire\Livewire::mount('add-to-wishlist', ['product_id' => $pro->product_id,'style' => 'color : white; margin-top:10px;']);
    $html = $response->html();
    $_instance->logRenderedChild('mjxJJUc', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                                          <span class="tooltip-label">Wishlist</span>
                                                        </a></div>
                                                   </div>
                                                </div>

                                                <div class="countdown simple-bar fix ms-auto" data-fixTime='{"Days": "3", "Hours": "<?php echo e(rand(1,5)); ?>", "Minutes": "00"}'
                                                    data-endText="Offer ended" data-zeroPad='{"Days": "false"}'>
                                                     (hours):(minutes):(seconds) <?php echo e(__('body.left')); ?>

                                                </div>
                                               
                                               
                                             </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                              <?php endif; ?>
                             </div>
                             
                           </div><!-- stage -->
                     </div>
                     
                     <div class="customNavigation">
                        <div class="navigation_wrap" style="<?php if(app()->getLocale() == 'en'): ?> float:right; <?php else: ?> float:left; <?php endif; ?>">
                           <a class="mdi mdi-arrow-left  prev" id="deal-prev">Prev</a>
                           <a class="mdi mdi-arrow-right  next" id="deal-next">Next</a>
                        </div>
                     </div>
                  </div>
               
            
         </div>
      </div>
  <div class="col-lg-2" style="background-color:red;"></div>
</div>
<?php endif; ?>
<!-- ends here -->
  




    <div class="prodcut-d-section mb-3">
        <div class="ttbanner-img section-d-header col-sm-12 col-xs-12">
            <a href="#">
            <img alt="bottombanner-01.jpg" src="<?php echo e(asset('main/images/bottombanner-01.jpg')); ?>">
            </a>
        </div>
    </div>
        
    <div class="mt-3" style="position: relative;">
        <header class="section-header">
            <h2 class="tt-title"><?php echo e(__('body.latest_blog')); ?></h2>
        </header>
        <div style="width: 100%; position: relative;">
        <div class="row">
        <div id="blog_slider" class="grid-blog-slider owl-carousel owl-theme owl-loaded owl-drag">  
        <div class="owl-stage-outer">
            <div class="owl-stage">
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="owl-item">
                        <div class="grid__item medium-up--one-third">
                        <div class="article__grid__inner tt-blog-content">
                        <div class="ttblog_image_holder blog_image_holder">
                            <a href="#" class="article__grid-image">
                            <img src="<?php echo e(asset('main/images/blog/blog-05_380x240.jpg')); ?>" alt="From Now we are certified web">
                            </a>
                            <span class="bloglinks">
                            <a class="icon zoom" data-lightbox="example-set" href="" title="Click to view Full Image">
                                <i class="mdi mdi-magnify"></i>
                            </a> 
                            </span>
                        </div>
                        <div class="blog-content-wrap col-xs-12 p-3">
                            
                            <h4 class="article__title">
                                <a href="<?php echo e(route('blog.show',$article->id)); ?>"> <?php echo e($article->title); ?></a>
                            </h4>
                            <div>
                                <i class="mdi mdi-calendar-blank" aria-hidden="true"></i>
                                <span class="date"><?php echo e(date_format ($article->created_at,'d')); ?></span>
                                <span class="month"><?php echo e(date_format ($article->created_at,'M')); ?></span>
                            </div>
            
                            <div class="rte article__grid-excerpt" style="height:42px; overflow:hidden;">
                                <?php echo e($article->content); ?>

                            </div>
                            <div class="list--inline article__meta-buttons">
                                <a href="<?php echo e(route('blog.show',$article->id)); ?>" class="read-more"><?php echo e(__('body.read_more')); ?></a>
                            </div>
                            
                        </div>
                        </div>
                    </div>
                    </div><!-- end of owl item -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            </div>
                </div>
                </div>
                <div class="customNavigation">
                    <div class="navigation_wrap">
                        <a class="mdi mdi-arrow-left blog_prev prev">Prev</a>
                        <a class="mdi mdi-arrow-right blog_next next">Next</a>
                    </div>
                </div>
            </div>
        
    </div>

    
    <div class="category-area mt-3 mb-3">
        <div class="cat-header mb-3 rounded" style="background-color: #eee;">
                    <div class="category-header-section">
                        <strong><?php echo e(__('body.categories')); ?></strong>
                    </div>
                </div>
        <div class="brand-carousel">
            <div class="brands">
            <div class="swiper-wrapper">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide text-center" style="display: flex; flex-direction:column;">
                <div>
                    <a href="<?php echo e(route('product.category',$category->id)); ?>">
                        <img src="<?php echo e($category->image); ?>" alt="NFL" class="img-responsive" />
                    </a>
                </div>
                <div class="text-center mt-3">
                        <?php if(app()->getLocale() == 'en'): ?> <?php echo e($category->en_name); ?> <?php else: ?> <?php echo e($category->name); ?>  <?php endif; ?>
                </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            </div>
            </div>
            
            </div>
        
        
    
                
        
        </div>

        


    </div><!-- end of right side -->



</div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/main/main.blade.php ENDPATH**/ ?>