@extends('main/layouts/app')
@section('content')

 <!-- breadcrumb start -->
 <div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ __('rp.rp-0') }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{ __('body.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('rp.rp-0') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container mb-3">
    <section>
        <h3 class="text-center">{{ __('rp.rp-0') }}</h3>
        <span>{{ __('rp.rp-5') }}</span>
        <ul class="term-condition-contact">
            <li>{{ __('rp.rp-1') }}</li>
            <li>{{ __('rp.rp-2') }}</li>
            <li>{{ __('rp.rp-3') }}</li>
            <li>{{ __('rp.rp-4') }}</li>
        </ul>

        <h5>{{ __('policy.pol-15') }}</h5>
        <ul class="term-condition-contact">
            <li>https://www.instagram.com</li>
            <li>https://iwtsp.com/96895394954</li>
            <li>m.g.shop1999@gmail.com</li>
        </ul>
    </section>
</div>

@endsection