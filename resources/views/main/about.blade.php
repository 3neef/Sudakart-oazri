@extends('main/layouts/app')
@section('content')
  <!-- breadcrumb start -->
  <div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ __('body.about') }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{ __('body.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('body.about') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

  <!-- about section start -->
  <section class="about-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-section"><img src="{{ asset('main/images/about-us-new.jpg') }}"
                        class="img-fluid blur-up lazyload" alt=""></div>
            </div>
            <div class="col-sm-12">
                <h3 class="text-center mt-3">{{ __('labels.about_us_title') }}</h3>
                
                <p style="color:black; font-size:1.5em;">{{ __('content.about_us_content') }}</p>

                <h4 class="mt-3">{{ __('labels.call_us_title') }}</h4>
                <h5>{{ __('labels.whatscall') }} : 95394954</h5>
                <h5>{{ __('labels.instagram') }} : oazri1</h5>
                <h5>{{ __('body.email') }} : m.g.shop1999@gmail.com</h5>
            </div>
        </div>
    </div>
</section>
<!-- about section end -->



@endsection
