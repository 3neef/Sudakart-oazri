@extends('main/layouts/app')
@section('content')

 <!-- breadcrumb start -->
 <div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ __('policy.pol-17') }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('policy.pol-17') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container mb-3">
    <section>
        <h3 class="text-center">{{ __('policy.pol-16') }}</h3>
        <span>{{ __('policy.pol-0') }}</span>
        <ul class="term-condition-contact">
            <li>{{ __('policy.pol-1') }}</li>
            <li>{{ __('policy.pol-2') }}</li>
            <li>{{ __('policy.pol-3') }}</li>
            <li>{{ __('policy.pol-4') }}</li>
            <li>{{ __('policy.pol-5') }}</li>
            <li>{{ __('policy.pol-6') }}</li>
            <li>{{ __('policy.pol-7') }}</li>
            <li>{{ __('policy.pol-8') }}</li>
            <li>{{ __('policy.pol-9') }}</li>
            <li>{{ __('policy.pol-10') }}</li>
            <li>{{ __('policy.pol-11') }}</li>
            <li>{{ __('policy.pol-12') }}</li>
            <li>{{ __('policy.pol-13') }}</li>
            <li>{{ __('policy.pol-14') }}</li>
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