@extends('main/layouts/app')
@section('content')

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row" style="padding-top: 20px;">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Order Details</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Your Order</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!-- section start -->
<section class="section-b-space">
    <div class="container">
        <div class="alert alert-success" role="alert">
            Thank you for shopping at Oazri
          </div>
        <div class="checkout-page">
            <div class="checkout-form">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>Billing Details</h3>
                            </div>
                            <div class="row check-out">
                                
                               <h3>Name : {{ Auth::guard('web')->user()->userable->name }}</h3>
                               <h3>Phone : {{ Auth::guard('web')->user()->phone }}</h3>
                               <h3>Email : {{ Auth::guard('web')->user()->email }}</h3>
                               <h3>Address : {{ $order->address }}</h3>
                               
                              
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div>Product <span>Total</span></div>
                                    </div>
                                    <ul class="qty">
                                        @foreach($order->newProduct as $product)
                                        <li>{{ $product->name }} × {{ $product->pivot->quantity }} 
                                            <span>{{ number_format($product->pivot->price * $product->pivot->quantity,2) }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                   
                                    <ul class="total">
                                      <li>Shipping Cost : {{ $order->delivery_amount }}</li>
                                      <li>Total Cost : {{ $order->total }}</li>
                                    </ul>
                                </div>
                                <div class="payment-box">
                                    <div class="upper-box">
                                       
                                        <div class="payment-options">
                                            <h4 class="mb-3">Payment Method : </h4>
                                            @if($order->payment_method == 'cash')
                                                <h4>Cash On Delivery</h4>
                                            @else  
                                               <h4>Online</h4>
                                            @endif
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
            <a href="{{ route('home.web') }}" class="btn btn-lg btn-danger rounder">continue shopping</a>
        </div>
    </div>
</section>
<!-- section end -->

@endsection