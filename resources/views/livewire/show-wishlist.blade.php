<div>
     <!--section start-->
     <section class="wishlist-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 table-responsive-xs">
                    @if($favs->count() > 0)
                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">{{ __('body.image') }}</th>
                                <th scope="col">{{ __('body.product') }}</th>
                                <th scope="col">{{ __('body.price') }}</th>
                                <th scope="col">{{ __('body.availability') }}</th>
                                <th scope="col">{{ __('body.action') }}</th>
                            </tr>
                        </thead>

                        @foreach($favs as $fav)
                        
                        <tbody>
                            <tr>
                                <td>
                                    <a href="{{ route('product.show',$fav->product->id) }}"><img src="{{ $fav->product->productImages[0] }}" alt=""></a>
                                </td>
                                <td><a href="#">cotton shirt</a>
                                    <div class="mobile-cart-content row">
                                        <div class="col">
                                            <p>in stock</p>
                                        </div>
                                        <div class="col">
                                            <h2 class="td-color">{{ $fav->product->price }}</h2>
                                        </div>
                                        <div class="col">
                                            @if($fav->product->attributes->count() == 0)
                                            <form id="add-to-cart-form-no-option-{{$fav->product->id}}" action="{{ route('cart.addTocart')}}" 
                                            class="add-to-cart-form-no-option" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $fav->product->id }}">
                                            <button class="add-to-cart-no-option" style="border:none; background:none;"
                                             data-id="{{ $fav->product->id }}" title="Add to cart">
                                                <i class="ti-shopping-cart"></i>
                                            </button>
                                            </form>
                                            @else 
                                            <a  href="{{ route('product.show',$fav->product->id) }}" title="Add to cart">
                                                    <i class="ti-shopping-cart"></i>
                                            </a>
                                            @endif
                                            <button wire:click="removeFav('{{ $fav->product->id }}')" style="border:none; background:none;" class="icon">
                                                <i class="ti-close"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2>{{ $fav->product->price }}</h2>
                                </td>
                                <td>
                                    <p>in stock</p>
                                </td>
                                <td>
                                    <div class="col">
                                        @if($fav->product->attributes->count() == 0)
                                        <form id="add-to-cart-form-no-option-{{$fav->product->id}}" action="{{ route('cart.addTocart')}}" 
                                        class="add-to-cart-form-no-option" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $fav->product->id }}">
                                        <button class="add-to-cart-no-option" style="border:none; background:none;"
                                         data-id="{{ $fav->product->id }}" title="Add to cart">
                                            <i class="ti-shopping-cart"></i>
                                        </button>
                                        </form>
                                        @else 
                                       
                                        <button style="border:none; background:none;"> <a  href="{{ route('product.show',$fav->product->id) }}" title="Add to cart"> 
                                            <i class="ti-shopping-cart"></i></a></button>
                                        
                                        @endif
                                        <button wire:click="removeFav('{{ $fav->product->id }}')" style="border:none; background:none;" class="icon">
                                            <i class="ti-close"></i>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                       
                          
                        @endforeach
                        
                    </table>
                    @else 
                    <h3 class="text-center text-danger">{{ __('msg.wishlist_msg') }}</h3>
                    @endif
                </div>
            </div>
            <div class="row wishlist-buttons">
                <div class="col-12">
                    <a href="{{ route('home.web') }}" class="btn btn-solid">{{ __('body.continue_shopping') }}</a> 
                    @if($favs->count() > 0)
                    <a href="{{ route('cart.checkout') }}" class="btn btn-solid">{{ __('body.checkout') }}</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--section end-->
</div>
