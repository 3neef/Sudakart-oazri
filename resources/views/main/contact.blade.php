@extends('main/layouts/app')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ __('body.contact') }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{ __('body.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('body.contact') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->




    <!--section start-->
    <section class="contact-page section-b-space">
        <div class="container">
            <div class="row section-b-space">
                <div class="col-lg-7 map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58789.76232635502!2d57.73559462356141!3d22.936959955173375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e8e579614622c71%3A0x3d8700d24ca4129d!2sIzki%2C%20Oman!5e0!3m2!1sen!2s!4v1666275730087!5m2!1sen!2s"
                        allowfullscreen></iframe>
                </div>
                <div class="col-lg-5">
                    <div class="contact-right">
                        <ul>
                            <li>
                                <div class="contact-icon"><img src="{{ asset('main/images/icon/phone.png') }}"
                                        alt="Generic placeholder image">
                                    <h6>{{ __('body.contact') }}</h6>
                                </div>
                                <div class="media-body">
                                    <p   >@if(app()->getLocale() == 'ar') 968-95394954+ @else +968-95394954  @endif</p>
                                    <p>93502942</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <h6>{{ __('body.address') }}</h6>
                                </div>
                                <div class="media-body">
                                    <p>Oman</p>
                                    <p>Izki</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><img src="{{ asset('main/images/icon/email.png') }}"
                                        alt="Generic placeholder image">
                                    <h6>{{ __('body.email') }}</h6>
                                </div>
                                <div class="media-body">
                                    <p>Sm.g.shop1999@gmail.com</p>
                                </div>
                            </li>
                          
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <form class="theme-form">
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="name">{{ __('form.your_name') }}</label>
                                <input type="text" class="form-control" name="name" id="name" 
                                    required="">
                            </div>
                            <div class="col-md-6">
                                <label for="email">{{ __('form.your_email') }}</label>
                                <input type="text" class="form-control"  name="email"  required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">{{ __('form.phone_number') }}</label>
                                <input type="text" class="form-control" name="phone_number"
                                    required="">
                            </div>
                            <div class="col-md-6">
                                <label for="Company">{{ __('form.company') }}</label>
                                <input type="text" class="form-control"  name="company">
                            </div>
                            <div class="col-md-12">
                                <label for="review">{{ __('form.write_message') }}</label>
                                <textarea class="form-control" name="message"
                                    1 rows="6"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-solid" type="submit">{{ __('form.send_message') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
    @endsection