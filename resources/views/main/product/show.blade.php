@extends('main/layouts/app')
@section('content')

<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ __('labels.product') }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.web') }}">{{ __('body.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('labels.product') }}</li>
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
                                    
                                    @foreach($product->images as $image)
                                    <div><img src="{{ $image->image }}" alt=""
                                            class="img-fluid blur-up lazyload image_zoom_cls-{{ $loop->index }}"></div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-12 p-0">
                                        <div class="slider-nav">
                                            @foreach($product->images as $image)
                                            <div><img src="{{$image->image}}" alt=""
                                                    class="img-fluid blur-up lazyload"></div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 rtl-text">
                                <div class="product-right">
                                   
                                    <h2>{{ $product->en_name }}</h2>
                                    <div class="rating-section">
                                        <div class="rating">
                                           @for($i = 0 ; $i < $product->rate ; $i++)
                                             <i class="fa fa-star"></i>
                                           @endfor
                                        </div>
                                        
                                    </div>
                                   
                                    <h3 class="price-detail" id="fixed-price" data-price="{{ $product->price }}">@money($product->price,'OMR')  <span id="calcPrice"><span></h3>
                                    <div id="selectSize" class="addeffect-section product-description border-product">
                                        
                                        
                                        <form id="add-to-cart-form-with-option" action="{{ route('cart.addTocart')}}" 
                                                    class="add-to-cart-form-no-option" method="post">
                                                    @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                
                                                @foreach($product->attributes as $att)
                                                    <div class="form-group col-lg-3">
                                                        <label for="{{$att->en_name}}">{{ __('body.Choose') }} @if(app()->getLocale() == 'en') {{$att->en_name}} @else {{$att->name}} @endif</label>
                                                        <select  name="options[{{$att->en_name}}]" class="form-control options">
                                                           <option value=""></option>
                                                            @foreach($att->options as $option)
                                                            
                                                            <option value="{{ $option->id }}" data-increment="{{ $product->getIncrement($option->id)->increment }}">@if(app()->getLocale() == 'en') {{ $option->en_option }} @else {{ $option->option }} @endif</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endforeach
                                                
                                                <h6 class="product-title">{{ __('body.quantity') }}</h6>
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
                                                            aria-hidden="true"></i> {{ __('body.add_to_cart') }}
                                                    </button> 
                                                    
                                                </div>
                                          </form>
                                          
                                          <div class="mt-3">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td>{{ __('body.weight') }} :  {{ $product->sku }}</td>
                                                        
                                                    </tr>
                                                    <tr>
                                                    <td>{{ __('body.sku') }} :  {{ $product->weight }}</td>
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
                                                    class="icofont icofont-ui-home"></i>{{ __('body.Details') }}</a>
                                            <div class="material-border"></div>
                                        </li>
                                       
                                     
                                        <li class="nav-item"><a class="nav-link" id="review-top-tab" data-bs-toggle="tab"
                                                href="#top-review" role="tab" aria-selected="false"><i
                                                    class="icofont icofont-contacts"></i>{{ __('body.Write_Review') }}</a>
                                            <div class="material-border"></div>
                                        </li>
                                    </ul>
                                    <div class="tab-content nav-material" id="top-tabContent">
                                        <div class="tab-pane fade show active" id="top-home" role="tabpanel"
                                            aria-labelledby="top-home-tab">
                                            <div class="product-tab-discription">
                                               
                                               
                                                <div class="part">
                                                   <p>{{ $product->en_description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                                            @livewire('product-rating', ['product' => $product], key($product->id))
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
                        <h5 class="title-border">{{ __('labels.new_product') }}</h5>
                        <div class="offer-slider slide-1">
                            <div>
                                @foreach($latestProduct as $product)
                                <div class="media">
                                    <a href="{{ route('product.show',$product->id) }}"><img class="img-fluid blur-up lazyload"
                                            src="{{ $product->ProductImages[0] }}" alt=""></a>
                                    <div class="media-body align-self-center" style="display: flex; flex-direction: column;">
                                            <div class="mb-2">
                                              <a href="{{ route('product.show',$product->id) }}">@if(app()->getLocale() == 'en')  {{ $product->en_name }} @else {{ $product->name }}@endif</a>
                                            </div>
                                            <div class="rating">
                                                @for($i = 0 ;$i < $product->rate ; $i++ )
                                                <i class="fa fa-star"></i>
                                                @endfor
                                            </div>
                                            
                                           
                                        
                                        <h4>@money($product->price,'OMR')</h4>
                                    </div>
                                </div>
                                @endforeach
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
                <h2>{{ __('body.related_products') }}</h2>
            </div>
        </div>
        <div class="row search-product">

            @forelse($related as $product)
            <div class="j-box col-xl-3 col-md-4 col-6">
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="{{ route('product.show',$product->id) }}"><img src="{{ $product->productImages[0] }}"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="{{ route('product.show',$product->id) }}"><img src="{{ $product->productImages[0] }}"
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
           @empty 
           @endforelse
            
        </div>
    </div>
</section>
<!-- related products -->

  <!-- product-tab starts -->
  
<!-- product-tab ends -->


@endsection

@push('custom-js')
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
@endpush