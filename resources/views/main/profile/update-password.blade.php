@extends('main/layouts/app')
@section('content')
 <!-- breadcrumb start -->
 <div class="breadcrumb-section bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>profile</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.web') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">profile</li>
                    </ol>
                </nav>
            </div>
            @include('main/partials/profile-menu')
            <div class="col-md-9">
               
            @include('main/partials/alerts')
            <div class="card">
                <div class="card-header">
                    <div class="header-title">
                        <h3>{{ __('body.update-password') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="password">Current Password</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <input type="submit" class="btn btn-primary" value="{{ __('body.update-password') }}">
                    </form>
                </div>
            </div>

                  


            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
@endsection