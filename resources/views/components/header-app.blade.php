<div class="page-main-header">
    <div class="main-header-right row">
        <div class="main-header-left d-lg-none w-auto">
            <div class="logo-wrapper">
                <a href="{{route('admin.dashboard')}}">
                    <img class="blur-up lazyloaded d-block d-lg-none"
                        src="{{ asset('main/images/new_logo.png') }}" alt="">
                </a>
            </div>
        </div>
        <div class="mobile-sidebar w-auto">
            <div class="media-body text-end switch-sm">
                <label class="switch">
                    <a href="javascript:void(0)">
                        <i id="sidebar-toggle" data-feather="align-left"></i>
                    </a>
                </label>
            </div>
        </div>
        <div class="nav-right col">
            <ul class="nav-menus">
                <li>
                    <a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()">
                        <i data-feather="maximize-2"></i>
                    </a>
                </li>
                <li>
                            
                                @if(app()->getLocale() == 'ar')
                                    <a hreflang="en"  href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"> English
                                    </a>
                                        
                                @else
                                    <a hreflang="ar"  href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"> العربية 
                                    </a>
                                @endif
                        </li>
                <li class="onhover-dropdown">
                    <i data-feather="bell"></i>
                    <span class="badge badge-pill badge-primary pull-right notification-badge">{{ $notifications->where('is_opened', 0)->count() }}</span>
                    <span class="dot"></span>
                    <ul class="notification-dropdown onhover-show-div p-0">
                        <li>Notification <span class="badge badge-pill badge-primary pull-right">{{ $notifications->where('is_opened', 0)->count() }}</span></li>
                        @forelse ($notifications->where('is_opened', 0)->take(3) as $notification)
                        <li>
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mt-0">
                                        <span>
                                            <i class="shopping-color" data-feather="shopping-bag"></i>
                                        </span>{{$notification->title}}
                                    </h6>
                                    <p class="mb-0">{{$notification->message}}</p>
                                </div>
                            </div>
                        </li>
                            
                        @empty
                            <li>
                                <p>you have no notifications</p>
                            </li> 
                        @endforelse
                        <li class="txt-dark"><a href="{{route('admin.pushnotifications')}}">All</a> notification</li>
                    </ul>
                </li>
                <li class="onhover-dropdown">
                    <div class="media align-items-center">
                        <img class="align-self-center pull-right img-50 blur-up lazyloaded"
                            src="{{asset('images/arab.png')}}" alt="header-user">
                        <div class="dotted-animation">
                            <span class="animate-circle"></span>
                            <span class="main-circle"></span>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{route('logout')}}"  onclick="event.preventDefault();
                                this.closest('form').submit();">
                                    <i data-feather="log-out"></i>Logout 
                                </a>
    
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="d-lg-none mobile-toggle pull-right">
                <i data-feather="more-horizontal"></i>
            </div>
        </div>
    </div>
</div>