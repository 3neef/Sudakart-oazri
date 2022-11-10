@extends('main/layouts/app')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>@if(app()->getLocale() == 'en') {{ $category->en_name }} @else {{ $category->name }} @endif</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.web') }}">{{ __('body.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@if(app()->getLocale() == 'en') {{ $category->en_name }} @else {{ $category->name }} @endif</li>
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
                            @if($products->count() > 0)
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
                                                                    <li><img src="{{ asset('main/images/icon/2.png') }}" alt=""
                                                                            class="product-2-layout-view"></li>
                                                                    <li><img src="{{ asset('main/images/icon/3.png') }}" alt=""
                                                                            class="product-3-layout-view"></li>
                                                                    <li><img src="{{ asset('main/images/icon/4.png') }}" alt=""
                                                                            class="product-4-layout-view"></li>
                                                                    <li><img src="{{ asset('main/images/icon/6.png') }}" alt=""
                                                                            class="product-6-layout-view"></li>
                                                                </ul>
                                                            </div>
                                                            <div class="product-page-per-view">
                                                                <select id="count-category-product-select">
                                                                    <option value="">{{ __('body.Show_Per_page') }}</option>
                                                                    <option value="{{ route('product.category',[$category->id,'limit' => 2]) }}">24 {{ __('body.per_page') }}
                                                                    </option>
                                                                    <option value="{{ route('product.category',[$category->id,'limit' => 50]) }}">50 {{ __('body.per_page') }}
                                                                    </option>
                                                                    <option value="{{ route('product.category',[$category->id,'limit' => 100]) }}">100 {{ __('body.per_page') }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                           
                                                        </div>
                                                        

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                       
                                        <div class="product-wrapper-grid j-box">
                                            <div class="row margin-res" id="product-category-area" data-id="{{ $category->id }}">
                                                @foreach($products as $product)
                                                    <div class="col-xl-3 col-6">
                                                        <div class="product-box-outer">
                                                            <div class="product-box">
                                                                <div class="img-wrapper">
                                                                    <div class="front">
                                                                        <a href="{{ route('product.show',$product->id) }}"><img
                                                                                src="{{ $product->ProductImages ? $product->ProductImages[0] : '' }}"
                                                                                class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                                    </div>
                                                                    <div class="back">
                                                                    <a href="{{ route('product.show',$product->id) }}">
                                                                        <img src="{{ $product->ProductImages ? $product->ProductImages[0] : '' }}"
                                                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                                </div>
                                                                <div class="cart-info cart-wrap">
                                                                @if($product->attributes->count() == 0)
                                                                <form id="add-to-cart-form-no-option-{{$product->id}}" action="{{ route('cart.addTocart')}}" 
                                                                class="add-to-cart-form-no-option" method="post">
                                                                @csrf
                                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                <button class="add-to-cart-no-option" data-id="{{ $product->id }}" title="Add to cart">
                                                                    <i class="ti-shopping-cart"></i>
                                                                </button>
                                                                </form>
                                                                @else 
                                                            
                                                                <form action="{{ route('product.show',$product->id) }}" method="get">
                                                                    <button title="Add to cart">
                                                                        <i class="ti-shopping-cart"></i>
                                                                    </button>
                                                                </form>
                                                            
                                                                @endif
                                                                @livewire('add-to-wishlist', ['product_id' => $product->id])
                                                                    
                                                                </div>
                                                                </div>
                                                                <div class="product-detail">
                                                                <div>
                                                                    <a href="{{ route('product.show',$product->id) }}">
                                                                        <h6>{{ $product->en_name }}</h6>
                                                                    </a>
                                                                </div>
                                                                <div class="rating">
                                                                    
                                                                    @for($i = 0 ;$i < $product->rate ; $i++ )
                                                                    <i class="fa fa-star"></i>
                                                                    @endfor
                                                                    
                                                                </div>
                                                            
                                                                <h4>@money($product->price,'OMR')</h4>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                            </div>
                                        </div>
                                      

                                        

                                    </div>
                                </div>
                            </div>
                            @else 
                                <h3 class="text-danger text-center">{{ __('msg.product_category_empty') }}</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section End -->
    @endsection