@extends('main/layouts/app')
@section('content')
 <!-- breadcrumb start -->
 <div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ __('body.search') }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.web') }}">{{ __('body.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('body.search') }}</li>
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
            @if($results->count() > 0)
            @foreach($results as $result)
            <div class="col-lg-3 col-sm-6">
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="{{ route('product.show',$result->id) }}"><img src="{{ $result->ProductImages[0] }}"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="{{ route('product.show',$result->id) }}"><img src="{{ $result->ProductImages[0] }}"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                                @if($result->attributes->count() == 0)
                                <form id="add-to-cart-form-no-option-{{$result->id}}" action="{{ route('cart.addTocart')}}" 
                                class="add-to-cart-form-no-option" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $result->id }}">
                                <button class="add-to-cart-no-option" data-id="{{ $result->id }}" title="Add to cart">
                                    <i class="ti-shopping-cart"></i>
                                </button>
                                </form>
                                @else 
                                <form action="{{ route('product.show',$result->id) }}" method="get">
                                    <button title="Add to cart">
                                        <i class="ti-shopping-cart"></i>
                                    </button>
                                </form>
                                @endif
                                @livewire('add-to-wishlist', ['product_id' => $result->id])
                                
                        </div>
                    </div>
                    <div class="product-detail">
                    <div>
                        <a href="{{ route('product.show',$result->id) }}">
                                <h6>{{ $result->en_name }}</h6>
                        </a>
                        </div>
                        <div class="rating">
                            
                            @for($i = 0 ;$i < $result->rate ; $i++ )
                            <i class="fa fa-star"></i>
                            @endfor
                            
                        </div>
                    
                        <h4>@money($result->price,'OMR')</h4>
                    
                        
                    </div>
                </div>
            </div>
            @endforeach
            @else 
            <h3 class="text-center text-danger">{{ __('labels.no_result') }}</h3>
            @endif
           
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                {{ $results->links() }}
            </div>
        </div>
    </div>
</section>
<!-- product section end -->

@endsection