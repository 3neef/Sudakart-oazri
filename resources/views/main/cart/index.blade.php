@extends('main/layouts/app')
@section('content')

  <!-- breadcrumb start -->
  <div class="breadcrumb-section">
    <div class="container">
        <div class="row" style="padding-top: 20px;">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ __('body.cart') }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{ __('body.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('body.cart') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

 <!--section start-->
 <section class="cart-section section-b-space">
    <div class="container">
        @livewire('show-cart')
    </div>
</section>
<!--section end-->
@endsection