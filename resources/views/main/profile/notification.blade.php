@extends('main/layouts/app')
@section('content')
 <!-- breadcrumb start -->
 <div class="breadcrumb-section bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ __('body.notifications') }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{ __('body.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('body.notifications') }}</li>
                    </ol>
                </nav>
            </div>
            @include('main/partials/profile-menu')
            <div class="col-md-9">
                
                <section class="section-b-space pt-0 ratio_asos">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ route('profile.readAll') }}" class="btn btn-lg btn-success mb-3 rounded">{{ __('body.read_all') }}</a>
                            @forelse($notifications as $not)
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="header-title @if($not->is_opened == 0) active @endif">
                                        <h4>{{ $not->title }}</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="notification @if($not->is_opened == 0) active @endif">
                                        {{ $not->message }}
                                    </div>
                                </div>
                                
                            </div>
                            @empty
                            <h3 class="text-danger mt-3 text-center">You don't have any notification at the moment</h3>
                            @endforelse
                        </div>
                        <div class="col-lg-12">
                            {{ $notifications->links() }}
                        </div>
                      </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
@endsection


