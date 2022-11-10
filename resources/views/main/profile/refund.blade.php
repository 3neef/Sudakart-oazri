@extends('main/layouts/app')
@section('content')
 <!-- breadcrumb start -->
 <div class="breadcrumb-section bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ __('body.return_orders') }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{ __('body.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('body.return_orders') }}</li>
                    </ol>
                </nav>
            </div>
            @include('main/partials/profile-menu')
            <div class="col-md-9">
                
                <section class="section-b-space pt-0 ratio_asos">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-12">
                           <div class="card">
                                <div class="card-header">
                                    <div class="header-title"><h4>{{ __('body.return_orders') }}</h4></div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-hovered">
                                        <thead>
                                            <th>#{{ __('body.refrence_number') }}</th>
                                            <th>{{ __('body.date') }}</th>
                                            <th>{{ __('body.product') }}</th>
                                            <th>{{ __('body.reason') }}</th>
                                            <th>{{ __('body.status') }}</th>
                                            
                                        </thead>
                                        <tbody>
                                            
                                            @foreach($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>{{ $order->en_name }}</td>
                                                <td>{{ $order->reason }}</td>
                                                <td>{{ $order->status }}</td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                   
                                </div>
                                <div class="card-footer">
                                    {{ $orders->links() }}
                                </div>
                           </div>
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