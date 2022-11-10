@extends('main/layouts/app')
@section('content')
 <!-- breadcrumb start -->
 <div class="breadcrumb-section bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ __('body.profile') }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{ __('body.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('body.profile') }}</li>
                    </ol>
                </nav>
            </div>
            @include('main/partials/profile-menu')
            <div class="col-md-9">
                <div class="profile-details">
                    
                    <div class="user-data">
                        <h1 class="h5">
                            {{ Auth::guard('web')->user()->userable->name }}
                        </h1>
                        <h3 class="h6 text-secondary">
                            #{{ Auth::guard('web')->user()->userable->id }}
                        </h3>
                    </div>
                    <div class="profile-area-box">
                        <div>
                            <img src="{{ asset('main/images/profile/profile.jpg') }}" style="width : 150px; height:150px" alt="">
                        </div>
                        <div class="p-2">
                                <ul>
                               
                                    <li class="profile-info">{{ __('body.phone') }} : {{ Auth::guard('web')->user()->phone }}</li>
                                    <li class="profile-info">{{ __('body.Second_Phone') }} : {{ Auth::guard('web')->user()->userable->secondary_phone }}</li>
                               
                                    <li class="profile-info">{{ __('body.email') }} : {{ Auth::guard('web')->user()->email }}</li>
                                    
                                
                                    <li class="profile-info">{{ __('body.Orders') }} : {{ $customer->first()->orders_count }}</li>
                                    
                                </ul>
                                
                        </div>

                        
                    </div>
                    

                   
                    <a href="{{ route('profile.showUpdatePassword') }}" class="btn btn-danger">{{ __('body.reset_password') }}</a>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
@endsection