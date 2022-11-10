<div id="cart" class="btn-group top-cart-btns shadow">    
                
  <div class="site-header__cart icon-btn mx-1">
    <div class="wrapper-top-cart onhover-div mobile-cart">

        <div class="btn btn-inverse btn-block btn-lg dropdown-toggle" id="cart-top-right">
          <a href="@auth('web') {{ route('profile.notifications') }}@else # @endauth" style="color: #000;"> <i class="fa fa-bell" 
              style="font-size:25px;"></i></a>
         
          <div id="CartCount_sticky" class="site-header__cart-count">
            
            <span class="cart-products-count">
              @auth('web') 
              {{ \App\Models\Notification::where('user_id',Auth::guard('web')->user()->id)->where('is_opened',0)->count() }}
              @else 
               0
              @endauth
          </span>
          </div>
        </div>                  
    </div>
  </div>
  @livewire('wishlist-counter')
  @livewire('cart-counter')
  <div class="site-header__cart icon-btn mx-1">
    <div class="wrapper-top-cart onhover-div mobile-cart">

        <div class="btn btn-inverse btn-block btn-lg dropdown-toggle" id="cart-top-right">
          @if(app()->getLocale() == 'ar')
          <a hreflang="en"  href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" style="color: #000;"> Eng <i class="fa fa-globe" 
              style="font-size:25px;">
            </i>
          </a>
              
        @else
        <a hreflang="ar"  href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" style="color: #000;"> عربي <i class="fa fa-globe" 
              style="font-size:25px;">
            </i>
        </a>
        @endif
        </div>                  
    </div>
  </div>

</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home.web') }}"><img src="{{ asset('main/images/new_logo.png') }}" style="width: 130px; height:100px;" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home.web') }}">{{ __('body.home') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('about') }}">{{ __('body.about')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('blog.index') }}">{{ __('body.blog') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('contact') }}">{{ __('body.contact') }}</a>
          </li>
          @auth('web')
          @if(Auth::guard('web')->user()->userable_type == 'App\Models\Vendor')
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}">{{ __('adminDash.dashboard') }}</a>
          </li>
          @endif
          @endauth
          
        </ul>
      
      </div>
      <div id="cart-inside-header" class="btn-group">    
                
          <div class="site-header__cart icon-btn mx-1">
            <div class="wrapper-top-cart onhover-div mobile-cart">
  
                <div class="btn btn-inverse btn-block btn-lg dropdown-toggle" id="cart-top-right">
                  <a href="@auth('web') {{ route('profile.notifications') }}@else # @endauth" style="color: #000;"> <i class="fa fa-bell" 
                      style="font-size:25px;"></i></a>
                 
                  <div id="CartCount_sticky" class="site-header__cart-count">
                    
                    <span class="cart-products-count">
                      @auth('web') 
                      {{ \App\Models\Notification::where('user_id',Auth::guard('web')->user()->id)->where('is_opened',0)->count() }}
                      @else 
                       0
                      @endauth
                  </span>
                  </div>
                </div>                  
            </div>
          </div>
          @livewire('wishlist-counter')
          @livewire('cart-counter')
          <div class="site-header__cart icon-btn mx-1">
            <div class="wrapper-top-cart onhover-div mobile-cart">
  
                <div class="btn btn-inverse btn-block btn-lg dropdown-toggle" id="cart-top-right">
                  @if(app()->getLocale() == 'ar')
                  <a hreflang="en"  href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" style="color: #000;"> Eng <i class="fa fa-globe" 
                      style="font-size:25px;">
                    </i>
                  </a>
                      
                @else
                <a hreflang="ar"  href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" style="color: #000;"> عربي <i class="fa fa-globe" 
                      style="font-size:25px;">
                    </i>
                </a>
                @endif
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
                  <div><strong>{{ __('body.category-btn') }}</strong></div>
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
                                          aria-hidden="true"></i>{{ __('body.back') }}</div>
                              </div>
                              <ul id="sub-menu" class="sm pixelstrap sm-vertical">
                                  
                                  <li><a href="{{ route('category.index') }}">{{ __('body.all_cat') }}</a></li>
                                  @foreach(\App\Models\Category::all() as $category)
                                  <li><a href="{{ route('product.category',$category->id) }}">
                                    @if(app()->getLocale() == 'en') 
                                    {{ $category->en_name }} @else {{ $category->name }} @endif</a>
                                  </li>
                                  @endforeach
                              </ul>
                          </nav>
                      </div>
              </div>
              <div class="header-middle">
                 <div id="header-search" class="input-group">
                
  
  
                  <form action="{{ route('general.search') }}" method="get" class="input-group search-bar" role="search" style="position: relative;">
                  
                  <input type="search" name="q"  placeholder="{{ __('labels.search') }}" class="input-group-field" 
                      aria-label="Search our product" autocomplete="off"> 
                  <div class="collections-selector">
                  <select name="category" id="collection-option"  class="single-option-selector">
                      <option value="all">{{ __('body.all_cat') }}</option>
                      @foreach(\App\Models\Category::all() as $category)
                      <option value="{{ $category->id }}">@if(app()->getLocale() == 'en') {{ $category->en_name }} @else {{ $category->name }}  @endif</option>
                      @endforeach

                      </select>
                  </div>
                  <span class="input-group-btn search-submit-wrap">
                      <button type="submit" class="btn search-submit icon-fallback-text" style="z-index:0;">
                     
                      <span class="fallback-text">{{ __('body.search-btn') }}</span>
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
                @auth('web')
                <li>
                    <a href="{{ route('profile.index') }}">{{ __('body.account_details') }}</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('customer.logout') }}">
                        @csrf
                        <a href="{{ route('customer.logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit();">
                           {{ __('body.main_logout') }}
                        </a>
                    </form>   
                </li>
                @else
                <li>
                    <a href="{{ route('login.web') }}">{{ __('body.login') }}</a>
                </li>
                <li>
                    <a href="{{ route('customer.register') }}">{{ __('body.create_account') }}</a>
                </li>

                <li>
                    <a href="{{ route('register') }}">{{ __('body.create_vendor') }}</a>
                </li>
                
               @endauth
               
              
               
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

