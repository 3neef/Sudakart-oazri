@extends('main/layouts/app')
@section('content')
 <!-- breadcrumb start -->
 <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{ __('body.wishlist') }}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home.web') }}">{{ __('body.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('body.wishlist') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    @livewire('show-wishlist')

    @endsection