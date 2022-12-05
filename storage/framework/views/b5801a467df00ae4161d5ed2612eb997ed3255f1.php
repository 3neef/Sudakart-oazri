<div id="cart" class="btn-group top-cart-btns shadow">    
                
  <div class="site-header__cart icon-btn mx-1">
    <div class="wrapper-top-cart onhover-div mobile-cart">

        <div class="btn btn-inverse btn-block btn-lg dropdown-toggle" id="cart-top-right">
          <a href="<?php if(auth()->guard('web')->check()): ?> <?php echo e(route('profile.notifications')); ?><?php else: ?> # <?php endif; ?>" style="color: #000;"> <i class="fa fa-bell" 
              style="font-size:25px;"></i></a>
         
          <div id="CartCount_sticky" class="site-header__cart-count">
            
            <span class="cart-products-count">
              <?php if(auth()->guard('web')->check()): ?> 
              <?php echo e(\App\Models\Notification::where('user_id',Auth::guard('web')->user()->id)->where('is_opened',0)->count()); ?>

              <?php else: ?> 
               0
              <?php endif; ?>
          </span>
          </div>
        </div>                  
    </div>
  </div>
  <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('wishlist-counter')->html();
} elseif ($_instance->childHasBeenRendered('2xUUOr2')) {
    $componentId = $_instance->getRenderedChildComponentId('2xUUOr2');
    $componentTag = $_instance->getRenderedChildComponentTagName('2xUUOr2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('2xUUOr2');
} else {
    $response = \Livewire\Livewire::mount('wishlist-counter');
    $html = $response->html();
    $_instance->logRenderedChild('2xUUOr2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
  <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('cart-counter')->html();
} elseif ($_instance->childHasBeenRendered('feKVzdB')) {
    $componentId = $_instance->getRenderedChildComponentId('feKVzdB');
    $componentTag = $_instance->getRenderedChildComponentTagName('feKVzdB');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('feKVzdB');
} else {
    $response = \Livewire\Livewire::mount('cart-counter');
    $html = $response->html();
    $_instance->logRenderedChild('feKVzdB', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
  <div class="site-header__cart icon-btn mx-1">
    <div class="wrapper-top-cart onhover-div mobile-cart">

        <div class="btn btn-inverse btn-block btn-lg dropdown-toggle" id="cart-top-right">
          <?php if(app()->getLocale() == 'ar'): ?>
          <a hreflang="en"  href="<?php echo e(LaravelLocalization::getLocalizedURL('en', null, [], true)); ?>" style="color: #000;"> Eng <i class="fa fa-globe" 
              style="font-size:25px;">
            </i>
          </a>
              
        <?php else: ?>
        <a hreflang="ar"  href="<?php echo e(LaravelLocalization::getLocalizedURL('ar', null, [], true)); ?>" style="color: #000;"> عربي <i class="fa fa-globe" 
              style="font-size:25px;">
            </i>
        </a>
        <?php endif; ?>
        </div>                  
    </div>
  </div>

</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="<?php echo e(route('home.web')); ?>"><img src="<?php echo e(asset('main/images/new_logo.png')); ?>" style="width: 130px; height:100px;" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo e(route('home.web')); ?>"><?php echo e(__('body.home')); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo e(route('about')); ?>"><?php echo e(__('body.about')); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo e(route('blog.index')); ?>"><?php echo e(__('body.blog')); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo e(route('contact')); ?>"><?php echo e(__('body.contact')); ?></a>
          </li>
          <?php if(auth()->guard('web')->check()): ?>
          <?php if(Auth::guard('web')->user()->userable_type == 'App\Models\Vendor'): ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('adminDash.dashboard')); ?></a>
          </li>
          <?php endif; ?>
          <?php endif; ?>
          
        </ul>
      
      </div>
      <div id="cart-inside-header" class="btn-group">    
                
          <div class="site-header__cart icon-btn mx-1">
            <div class="wrapper-top-cart onhover-div mobile-cart">
  
                <div class="btn btn-inverse btn-block btn-lg dropdown-toggle" id="cart-top-right">
                  <a href="<?php if(auth()->guard('web')->check()): ?> <?php echo e(route('profile.notifications')); ?><?php else: ?> # <?php endif; ?>" style="color: #000;"> <i class="fa fa-bell" 
                      style="font-size:25px;"></i></a>
                 
                  <div id="CartCount_sticky" class="site-header__cart-count">
                    
                    <span class="cart-products-count">
                      <?php if(auth()->guard('web')->check()): ?> 
                      <?php echo e(\App\Models\Notification::where('user_id',Auth::guard('web')->user()->id)->where('is_opened',0)->count()); ?>

                      <?php else: ?> 
                       0
                      <?php endif; ?>
                  </span>
                  </div>
                </div>                  
            </div>
          </div>
          <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('wishlist-counter')->html();
} elseif ($_instance->childHasBeenRendered('Tx41QsZ')) {
    $componentId = $_instance->getRenderedChildComponentId('Tx41QsZ');
    $componentTag = $_instance->getRenderedChildComponentTagName('Tx41QsZ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Tx41QsZ');
} else {
    $response = \Livewire\Livewire::mount('wishlist-counter');
    $html = $response->html();
    $_instance->logRenderedChild('Tx41QsZ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
          <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('cart-counter')->html();
} elseif ($_instance->childHasBeenRendered('UvNhcbN')) {
    $componentId = $_instance->getRenderedChildComponentId('UvNhcbN');
    $componentTag = $_instance->getRenderedChildComponentTagName('UvNhcbN');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('UvNhcbN');
} else {
    $response = \Livewire\Livewire::mount('cart-counter');
    $html = $response->html();
    $_instance->logRenderedChild('UvNhcbN', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
          <div class="site-header__cart icon-btn mx-1">
            <div class="wrapper-top-cart onhover-div mobile-cart">
  
                <div class="btn btn-inverse btn-block btn-lg dropdown-toggle" id="cart-top-right">
                  <?php if(app()->getLocale() == 'ar'): ?>
                  <a hreflang="en"  href="<?php echo e(LaravelLocalization::getLocalizedURL('en', null, [], true)); ?>" style="color: #000;"> Eng <i class="fa fa-globe" 
                      style="font-size:25px;">
                    </i>
                  </a>
                      
                <?php else: ?>
                <a hreflang="ar"  href="<?php echo e(LaravelLocalization::getLocalizedURL('ar', null, [], true)); ?>" style="color: #000;"> عربي <i class="fa fa-globe" 
                      style="font-size:25px;">
                    </i>
                </a>
                <?php endif; ?>
                </div>                  
            </div>
          </div>
          
        
      
    </div>
  </nav>
<div id="shopify-section-header-model-2" class="shopify-section mb-2">
    <header class="site-header page-element header_2 cart_">
    <div class="full-header-wrap">
      <div class="full-header">
       
        <div class="menu-bar" style="background:#ffd803">
          <div class="d-flex" style="margin: 0 10px; justify-content: space-between;">
            
              <div id="shopify-section-TT-mega_menu" class="shopify-section tt-mega-menu">
                  <div><strong><?php echo e(__('body.category-btn')); ?></strong></div>
                  <div class="open-hidden-menu">
                      <a href="javascript:void(0)" onclick="openNav()">
                      <div class="bar-style">
                          <i class="fa fa-bars sidebar-bar" style="font-size: 28px ;color: #fff; cursor: pointer;" aria-hidden="true"></i>
                      </div>
                      
                      </a>
                  </div>
                  
                      <div id="mySidenav" class="sidenav">
                          <a href="javascript:void(0)" class="sidebar-overlay" onclick="closeNav()"></a>
                          <nav>
                              <div onclick="closeNav()">
                                  <div class="sidebar-back text-start"><i class="fa fa-angle-left pe-2"
                                          aria-hidden="true"></i><?php echo e(__('body.back')); ?></div>
                              </div>
                              <ul id="sub-menu" class="sm pixelstrap sm-vertical">
                                  
                                  <li><a href="<?php echo e(route('category.index')); ?>"><?php echo e(__('body.all_cat')); ?></a></li>
                                  <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <li><a href="<?php echo e(route('product.category',$category->id)); ?>">
                                    <?php if(app()->getLocale() == 'en'): ?> 
                                    <?php echo e($category->en_name); ?> <?php else: ?> <?php echo e($category->name); ?> <?php endif; ?></a>
                                  </li>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </ul>
                          </nav>
                      </div>
              </div>
              <div class="header-middle">
                 <div id="header-search" class="input-group">
                
  
  
                  <form action="<?php echo e(route('general.search')); ?>" method="get" class="input-group search-bar" role="search" style="position: relative;">
                  
                  <input type="search" name="q"  placeholder="<?php echo e(__('labels.search')); ?>" class="input-group-field" 
                      aria-label="Search our product" autocomplete="off"> 
                  <div class="collections-selector">
                  <select name="category" id="collection-option"  class="single-option-selector">
                      <option value="all"><?php echo e(__('body.all_cat')); ?></option>
                      <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($category->id); ?>"><?php if(app()->getLocale() == 'en'): ?> <?php echo e($category->en_name); ?> <?php else: ?> <?php echo e($category->name); ?>  <?php endif; ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </select>
                  </div>
                  <span class="input-group-btn search-submit-wrap">
                      <button type="submit" class="btn search-submit icon-fallback-text" style="z-index:0;">
                     
                      <span class="fallback-text"><?php echo e(__('body.search-btn')); ?></span>
                      </button>
                  </span>
                  
                  </form>

                  </div>
                  <div class="hidden-search-icon">
                      <button class="btn btn-lg" style="font-size:1.5em;" onclick="openSearch()"><i class="fa fa-search"></i></button>
                  </div>
              </div><!-- end of header middle -->
    
            
            <div class="myaccount icon-btn onhover-div  mobile-cart">
            <span class="dropdown-toggle"  title="My Account">
               
                <a href="javascript:void(0)">
                <i class="mdi mdi-account-outline">
                    </i><span>Sign in</span>
                </a>
                
            </span>
               
            <ul class="show-div w-170 rounded">
                <?php if(auth()->guard('web')->check()): ?>
                <li>
                    <a href="<?php echo e(route('profile.index')); ?>"><?php echo e(__('body.account_details')); ?></a>
                </li>
                <li>
                    <form method="POST" action="<?php echo e(route('customer.logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <a href="<?php echo e(route('customer.logout')); ?>" onclick="event.preventDefault();
                        this.closest('form').submit();">
                           <?php echo e(__('body.main_logout')); ?>

                        </a>
                    </form>   
                </li>
                <?php else: ?>
                <li>
                    <a href="<?php echo e(route('login.web')); ?>"><?php echo e(__('body.login')); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(route('customer.register')); ?>"><?php echo e(__('body.create_account')); ?></a>
                </li>

                <li>
                    <a href="<?php echo e(route('register')); ?>"><?php echo e(__('body.create_vendor')); ?></a>
                </li>
                
               <?php endif; ?>
               
              
               
            </ul>
            <div class="customer_account">  
               

            </div><!--  customer_account -->


            </div>
            

        </div>
        </div>


       </div>
    

    </div>
</header>

</div>  

<?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/main/partials/head.blade.php ENDPATH**/ ?>