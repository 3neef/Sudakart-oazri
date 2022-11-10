@extends('main/layouts/app')
@section('content')
<!--section start-->
<section class="blog-detail-page section-b-space ratio2_3">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 blog-detail">
                
                <h3>{{ $article->title }}</h3>
                <ul class="post-social">
                    <li>{{ date_format($article->created_at,'D M Y') }}</li>
                    <li>{{ __('body.Posted_By') }} : @if($article->shop) {{ $article->shop->shop_name }}@endif</li>
                    <li><i class="fa fa-comments"></i> {{ $article->comments->count() }} {{ __('body.comment') }}</li>
                </ul>
                <p style="font-size:18px; word-break:break-all;">{{ $article->content }}</p>
               
            </div>
        </div>
        @if($article->products->count() > 0)
        <h3 class="mt-3">{{ __('body.tagged_products') }}</h3>
        <hr>
        <div class="row j-box">
            @foreach ($article->products as $product)
            <div class="col-lg-4">
                <div class="product-box-outer">
                    <div class="product-box">
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="{{ route('product.show',$product->id) }}"><img
                                        src="{{ $product->ProductImages[0] }}"
                                        class="img-fluid blur-up lazyload bg-img m-0" alt=""></a>
                            </div>
                             <div class="back">
                            <a href="{{ route('product.show',$product->id) }}"><img src="{{ $product->ProductImages[0] }}"
                                    class="img-fluid blur-up lazyload bg-img m-0" alt=""></a>
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
        @endif
    </div>

        @livewire('article-comments', ['article' => $article], key($article->id))
        
   
</section>
<!--Section ends-->

@endsection