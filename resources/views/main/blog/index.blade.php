@extends('main/layouts/app')
@section('content')

  <!-- breadcrumb start -->
  <div class="breadcrumb-section">
    <div class="container">
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ __('body.blog') }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.web') }}">{{ __('body.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('body.blog') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


     <!-- section start -->
     <section class="section-b-space blog-page ratio2_3">
        <div class="container">
            <div class="row">
                <!--Blog sidebar start-->
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="blog-sidebar">
                        <div class="theme-card">
                            <h4>{{ __('body.popular_blog') }}</h4>
                            <ul class="popular-blog">
                                @forelse($pubs as $pub)
                                <li>
                                    <div class="media">
                                       

                                        
                                        <div class="blog-date">
                                            <a href="{{ route('blog.show',$pub->id) }}">
                                                <span>{{ date_format ($pub->created_at,'d') }} </span><span>
                                                {{ date_format($pub->created_at,'M') }}</span>
                                            </a>
                                        </div>
                                        <div class="media-body align-self-center">
                                          <a href="{{ route('blog.show',$pub->id) }}">
                                            <h6>{{ $pub->title }}</h6>
                                            <p>{{ $pub->views}}  {{ __('body.hits') }}</p>
                                          </a>
                                        </div>
                                        
                                    </div>
                                    
                                </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                <!--Blog sidebar start-->
                <!--Blog List start-->
                <div class="col-xl-9 col-lg-8 col-md-7 order-sec">
                    @foreach($articles as $article)
                    <div class="row blog-media">
                        <div class="col-xl-6">
                            <div class="blog-left">
                                <a href="{{ route('blog.show',$article->id) }}"><img src="{{ asset('main/images/new_logo.png') }}"
                                        class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="blog-right">
                                <div>
                                   
                                    <a href="{{ route('blog.show',$article->id) }}">
                                        <h4>{{ $article->title }}</h4>
                                    </a>
                                    <ul class="post-social">
                                        <li>
                                            <div style="display:flex; flex-direction:column;">
                                                <span> {{ __('body.Posted_By') }} : @if($article->shop) {{ $article->shop->shop_name }}@endif</span>
                                                <span>{{ date_format ($article->created_at,'F Y d') }}</span>
                                            </div>
                                        </li>
                                        <li><i class="fa fa-heart"></i> {{ $article->views }} {{ __('body.hits') }}</li>
                                        <li><i class="fa fa-comments"></i> {{ $article->comments->count() }} {{ __('body.comment') }}</li>
                                    </ul>
                                    
                                    <p>{{ $article->content }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  
                  
                </div>
                <!--Blog List start-->
            </div>
        </div>
    </section>


@endsection