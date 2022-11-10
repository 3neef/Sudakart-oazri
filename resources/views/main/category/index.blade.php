@extends('main/layouts/app')
@section('content')
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ __('body.all_cat') }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{ __('body.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('body.all_cat') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container mb-3 mt-3">
    <h3 class="text-center mb-3">{{ __('body.all_cat') }}</h3>
    <div class="row">
        
        @forelse($categories as $category)
            <div class="col-lg-3 col-sm-6">
                <div class="category-box">
                    <div class="category-image">
                        <a href="{{ route('product.category',$category->id) }}">
                            <img src="{{ $category->image }}" class="lazyload" />
                        </a>
                    </div> 
                    <div class="category-desc">
                        <h4>@if(app()->getLocale() == 'en') {{ $category->en_name }} @else {{ $category->name }} @endif</h4>
                        <h5>{{ __('body.products') }} : ({{ $category->products->count() }})</h5>
                    </div>
                </div>
            </div>
            
        @empty  
        <h3 class="text-danger text-center">{{ __('body.no_categoy') }}</h3>
        @endforelse
    </div>

    <div class="row">
        <div class="col-lg-12 mt-3">
            {{ $categories->links() }}
        </div>
    </div>
</div>


@endsection