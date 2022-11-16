@extends('layouts.app2')
@section('title', 'Products Show')
@section('content')
<div class="container-fluid">
    <div class="card">
        <section>
            <div class="collection-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="product-slick">
                                @if ($pro->images->count() > 0)
                                @foreach ($pro->images as $image)
                                <div><img src="{{asset($image->image)}}" alt=""
                                    class="img-fluid blur-up lazyload image_zoom_cls-0"></div>
                                @endforeach
                                @else
                                <div><img src="{{asset('images/placeholder.png')}}" alt=""
                                    class="img-fluid blur-up lazyload image_zoom_cls-0"></div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-12 p-0">
                                    <div class="slider-nav">
                                        @foreach ($pro->images as $image)
                                        <div><img src="{{asset($image ? $image->image : 'images/placeholder.png')}}" alt=""
                                            class="img-fluid blur-up lazyload"></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="product-right product-description-box">
                                <h2>{{$pro->name}}</h2>
                                <div class="rating-section">
                                    <div class="rating">
                                        @for ($i = 1; $i <= $pro->rate; $i++)
                                                    
                                        <li>
                                            <i class="fa fa-star theme-color"></i>
                                        </li>
                                        @endfor
                                        @for ($i = 1; $i <= 5-$pro->rate; $i++)
                                            
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        @endfor
                                    </div>
                                </div>
                                <h3 class="price-detail">{{$pro->price}} OMR</h3>
                                <div class="row product-accordion">
                                    <div class="col-sm-12">
                                        <div class="accordion theme-accordion" id="accordionExample">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0"><button class="btn btn-link" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                            aria-expanded="true" aria-controls="collapseOne">product
                                                            description</button></h5>
                                                </div>
                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                                    data-bs-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <p>{{$pro->description}}</p>
                                                        <div class="single-product-tables detail-section">
                                                            <table>
                                                                <tbody>
                                                                    @foreach ($pro->attributes as $attribute)
                                                                    @foreach ($attribute->options as $option)
                                                                    <tr>
                                                                        <td>{{$option->attribute->name}}</td>
                                                                        <td>{{$option->option}}</td>
                                                                    </tr>
                                                                    @endforeach
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <span>Quantity : {{$pro->quantity > 0 ? $pro->quantity : 0 }}</span> <br>
                                                    <span>SKU : {{$pro->sku}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection


@push('styles')
<link href="{{asset('css/style.css')}}" rel="stylesheet" />
<link href="{{asset('css/slick.css')}}" rel="stylesheet" />
<link href="{{asset('css/slick-theme.css')}}" rel="stylesheet" />
@endpush

@push('scripts')
<script src="{{asset('js/slick.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
@endpush
