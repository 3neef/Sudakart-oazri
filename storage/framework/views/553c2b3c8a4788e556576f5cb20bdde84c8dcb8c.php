
<?php $__env->startSection('content'); ?>

<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2><?php echo e(__('labels.product')); ?></h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home.web')); ?>"><?php echo e(__('body.home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('labels.product')); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>



   <!-- section start -->
   <section>
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">

                <div class="col-lg-9 col-sm-12">
                    <div class="containr-fluid p-0">
                        <div class="row">
                        
                            <div class="col-lg-6">
                                <div class="product-slick">
                                    
                                    <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div><img src="<?php echo e($image->image); ?>" alt=""
                                            class="img-fluid blur-up lazyload image_zoom_cls-<?php echo e($loop->index); ?>"></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-0">
                                        <div class="slider-nav">
                                            <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div><img src="<?php echo e($image->image); ?>" alt=""
                                                    class="img-fluid blur-up lazyload"></div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 rtl-text">
                                <div class="product-right">
                                   
                                    <h2><?php echo e($product->en_name); ?></h2>
                                    <div class="rating-section">
                                        <div class="rating">
                                           <?php for($i = 0 ; $i < $product->rate ; $i++): ?>
                                             <i class="fa fa-star"></i>
                                           <?php endfor; ?>
                                        </div>
                                        
                                    </div>
                                   
                                    <h3 class="price-detail" id="fixed-price" data-price="<?php echo e($product->price); ?>"><?php echo money($product->price,'OMR'); ?>  <span id="calcPrice"><span></h3>
                                    <div id="selectSize" class="addeffect-section product-description border-product">
                                        
                                        
                                        <form id="add-to-cart-form-with-option" action="<?php echo e(route('cart.addTocart')); ?>" 
                                                    class="add-to-cart-form-no-option" method="post">
                                                    <?php echo csrf_field(); ?>
                                                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                                
                                                <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $att): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="form-group col-lg-3">
                                                        <label for="<?php echo e($att->en_name); ?>"><?php echo e(__('body.Choose')); ?> <?php if(app()->getLocale() == 'en'): ?> <?php echo e($att->en_name); ?> <?php else: ?> <?php echo e($att->name); ?> <?php endif; ?></label>
                                                        <select  name="options[<?php echo e($att->en_name); ?>]" class="form-control options">
                                                           <option value=""></option>
                                                            <?php $__currentLoopData = $att->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            
                                                            <option value="<?php echo e($option->id); ?>" data-increment="<?php echo e($product->getIncrement($option->id)->increment); ?>"><?php if(app()->getLocale() == 'en'): ?> <?php echo e($option->en_option); ?> <?php else: ?> <?php echo e($option->option); ?> <?php endif; ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                                <h6 class="product-title"><?php echo e(__('body.quantity')); ?></h6>
                                                <div id="quantity-area" class="qty-box">
                                                    <div class="input-group"><span class="input-group-prepend">
                                                        <button type="button"
                                                                class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                                                    class="ti-angle-left"></i></button> 
                                                        </span>
                                                        <input type="text" name="quantity" class="form-control input-number" value="1">
                                                        <span class="input-group-prepend"><button type="button"
                                                                class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                                    class="ti-angle-right"></i></button></span>
                                                    </div>
                                                </div>
                                            
                                                </div>
                                                <div class="product-buttons">
                                                    <button id="cartEffect" 
                                                        class="btn btn-solid hover-solid btn-animation" type="submit"
                                                        <i class="fa fa-shopping-cart me-1 show-add-to-cart"
                                                            aria-hidden="true"></i> <?php echo e(__('body.add_to_cart')); ?>

                                                    </button> 
                                                    
                                                </div>
                                          </form>
                                          
                                          <div class="mt-3">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td><?php echo e(__('body.weight')); ?> :  <?php echo e($product->sku); ?></td>
                                                        
                                                    </tr>
                                                    <tr>
                                                    <td><?php echo e(__('body.sku')); ?> :  <?php echo e($product->weight); ?></td>
                                                    </tr>
                                                </table>
                                          </div>
                                   
                                </div>
                            </div>
    
                        </div>
                    </div>
                    <section class="tab-product m-0">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-lg-12">
                                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab"
                                                href="#top-home" role="tab" aria-selected="true"><i
                                                    class="icofont icofont-ui-home"></i><?php echo e(__('body.Details')); ?></a>
                                            <div class="material-border"></div>
                                        </li>
                                       
                                     
                                        <li class="nav-item"><a class="nav-link" id="review-top-tab" data-bs-toggle="tab"
                                                href="#top-review" role="tab" aria-selected="false"><i
                                                    class="icofont icofont-contacts"></i><?php echo e(__('body.Write_Review')); ?></a>
                                            <div class="material-border"></div>
                                        </li>
                                    </ul>
                                    <div class="tab-content nav-material" id="top-tabContent">
                                        <div class="tab-pane fade show active" id="top-home" role="tabpanel"
                                            aria-labelledby="top-home-tab">
                                            <div class="product-tab-discription">
                                               
                                               
                                                <div class="part">
                                                   <p><?php echo e($product->en_description); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('product-rating', ['product' => $product])->html();
} elseif ($_instance->childHasBeenRendered($product->id)) {
    $componentId = $_instance->getRenderedChildComponentId($product->id);
    $componentTag = $_instance->getRenderedChildComponentTagName($product->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($product->id);
} else {
    $response = \Livewire\Livewire::mount('product-rating', ['product' => $product]);
    $html = $response->html();
    $_instance->logRenderedChild($product->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                        </div>
                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-sm-3 collection-filter">
                 
                    <!-- side-bar single product slider start -->
                    <div class="theme-card">
                        <h5 class="title-border"><?php echo e(__('labels.new_product')); ?></h5>
                        <div class="offer-slider slide-1">
                            <div>
                                <?php $__currentLoopData = $latestProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="media">
                                    <a href="<?php echo e(route('product.show',$product->id)); ?>"><img class="img-fluid blur-up lazyload"
                                            src="<?php echo e($product->ProductImages[0]); ?>" alt=""></a>
                                    <div class="media-body align-self-center" style="display: flex; flex-direction: column;">
                                            <div class="mb-2">
                                              <a href="<?php echo e(route('product.show',$product->id)); ?>"><?php if(app()->getLocale() == 'en'): ?>  <?php echo e($product->en_name); ?> <?php else: ?> <?php echo e($product->name); ?><?php endif; ?></a>
                                            </div>
                                            <div class="rating">
                                                <?php for($i = 0 ;$i < $product->rate ; $i++ ): ?>
                                                <i class="fa fa-star"></i>
                                                <?php endfor; ?>
                                            </div>
                                            
                                           
                                        
                                        <h4><?php echo money($product->price,'OMR'); ?></h4>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
            
                        </div>
                    </div>
                    <!-- side-bar single product slider end -->
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->

 <!-- related products -->
 <section class="section-b-space pt-0 ratio_asos mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 product-related">
                <h2><?php echo e(__('body.related_products')); ?></h2>
            </div>
        </div>
        <div class="row search-product">

            <?php $__empty_1 = true; $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="j-box col-xl-3 col-md-4 col-6">
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="<?php echo e(route('product.show',$product->id)); ?>"><img src="<?php echo e($product->productImages[0]); ?>"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="<?php echo e(route('product.show',$product->id)); ?>"><img src="<?php echo e($product->productImages[0]); ?>"
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
} elseif ($_instance->childHasBeenRendered('RknvJ1E')) {
    $componentId = $_instance->getRenderedChildComponentId('RknvJ1E');
    $componentTag = $_instance->getRenderedChildComponentTagName('RknvJ1E');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('RknvJ1E');
} else {
    $response = \Livewire\Livewire::mount('add-to-wishlist', ['product_id' => $product->id]);
    $html = $response->html();
    $_instance->logRenderedChild('RknvJ1E', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> 
           <?php endif; ?>
            
        </div>
    </div>
</section>
<!-- related products -->

  <!-- product-tab starts -->
  
<!-- product-tab ends -->


<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-js'); ?>
    <script>
        $('.options').on('change',function(){
            
			var increment = 0;
            var price = 0;
			$('.options').each(function(){
                if(!isNaN($(this).find(':selected').data('increment'))){
                    increment += $(this).find(':selected').data('increment');
                }
				
			});

            var fixed_price = $('#fixed-price').data('price');
            price = fixed_price;
            var total = price + increment;
            console.log(total);
            $('#calcPrice').html(parseFloat(total,2));

		});
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('main/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/main/product/show.blade.php ENDPATH**/ ?>