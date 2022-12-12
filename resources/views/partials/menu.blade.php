<!-- Page Sidebar Start-->
@php
$user = Auth::user();
@endphp
<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper">
            <img class="img-60" src="{{asset('images/arab.png')}}" alt="#">
            <div>
                <h6 class="f-14">{{auth()->user()->userable->first_name}}</h6>
                <p>{{ $user->roles->toArray()[0]['name'] }}</p>
            </div>
        </div>
    </div>
    <div class="sidebar custom-scrollbar">
        <a href="javascript:void(0)" class="sidebar-back d-lg-none d-block"><i class="fa fa-times"
                aria-hidden="true"></i></a>
        <ul class="sidebar-menu">
            <li>
                <a class="sidebar-header" href="{{route('admin.dashboard')}}">
                    <i data-feather="home"></i>
                    <span>{{ __('adminNav.dashboard') }}</span>
                </a>
            </li>
            @can('view-products', $user)
            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="box"></i>
                    <span>{{ __('adminNav.products') }}</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul class="sidebar-submenu">

                    <li>
                        <a href="{{route('admin.products.index')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('adminNav.all_products') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.products.stoped')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('adminNav.sus_products') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.products.rates')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('adminNav.product_review') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('view-orders', $user)
            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="archive"></i>
                    <span>{{ __('adminNav.orders') }}</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('admin.orders.index')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('adminNav.order_list') }}</span>
                        </a>
                    </li>

                    <li>
                                    <a href="{{route('admin.orders.inbound')}}">
                    <i class="fa fa-circle"></i>
                    <span>{{ __('adminNav.dashboard') }}</span>
                    </a>
            </li>

            <li>
                <a href="{{route('admin.orders.inbound')}}">
                    <i class="fa fa-circle"></i>
                    <span>{{__('adminNav.Inbound')}}</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.orders.outbound')}}">
                    <i class="fa fa-circle"></i>
                    <span>{{__('adminNav.Outbound')}}</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.orders.scheduled')}}">
                    <i class="fa fa-circle"></i>
                    <span>{{__('adminNav.scheduled')}}</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.orders.canceled')}}">
                    <i class="fa fa-circle"></i>
                    <span>{{ __('adminNav.canceled_orders') }}</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.orders.returned')}}">
                    <i class="fa fa-circle"></i>
                    <span>{{ __('adminNav.returned_products') }}</span>
                </a>
            </li>
        </ul>
        </li>
        @endcan
        @can('view-payments', $user)
        <li>
            <a class="sidebar-header" href="javascript:void(0)">
                <i data-feather="dollar-sign"></i>
                <span>{{ __('adminNav.accounting') }}</span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="{{route('admin.accounting.payments')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.payments') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.accounting.wallets')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.wallets') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.accounting.transactions')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.transactions') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.accounting.expenses')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.expenses') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.accounting.expensetypes')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.expenses_type') }}
                    </a>
                </li>
            </ul>
        </li>
        @endcan
        @can('view-vendors', $user)
        <li>
            <a class="sidebar-header" href="javascript:void(0)">
                <i data-feather="tag"></i>
                <span>{{ __('adminNav.vendors') }}</span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="{{route('admin.vendors')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.vendor_list') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.vendors.pending')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.pending_vendors') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.vendors.pending.categories')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.category_requests') }}
                    </a>
                </li>
                @can('view-vendors', $user)
                <li>
                    <a href="{{route('admin.vendors.suspended')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.sus_vendors') }}
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcan
        @can('view-promotions', $user)

        <li>
            <a class="sidebar-header" href="javascript:void(0)">
                <i data-feather="clipboard"></i>
                <span>{{ __('adminNav.promotions') }}</span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="{{route('admin.offers')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.offers') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.coupons')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.cupon') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.blogs')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.blogs') }}
                    </a>
                </li>
                @can('create-ads', $user)
                <li>
                    <a href="{{route('admin.ads')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.ads') }}
                    </a>
                </li>
                @endcan
                @can('create-push-notification', $user)
                <li>
                    <a href="{{route('admin.pushnotifications')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.notifications') }}
                    </a>
                </li>
                @endcan
                @can('create-upselling')
                <li>
                    <a href="{{route('admin.upselling')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.upselling') }}
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcan
        @can('view-customers', $user)
        <li>
            <a class="sidebar-header" href="javascript:void(0)">
                <i data-feather="align-left"></i>
                <span>{{ __('adminNav.customers') }}</span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="{{route('admin.customers')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.customer_list') }}
                    </a>
                </li>
                @can('view-vip-customers', $user)
                <li>
                    <a href="{{route('admin.customers.vip')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.vip_customer') }}
                    </a>
                </li>
                @endcan

            </ul>
        </li>
        @endcan
        @can('view-data-analysis', $user)
        <li>
            <a class="sidebar-header" href="javascript:void(0)">
                <i data-feather="user-plus"></i>
                <span>{{ __('adminNav.data_ana') }}</span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="{{route('admin.products.get.mostviewed')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.most_viewed_product') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.products.mostsold')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.most_sold_products') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.blogs.mostviewed')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.most_viewed_blogs') }}
                    </a>
                </li>
                @can('data-analysis-vip-vendors', $user)
                <li>
                    <a href="{{route('admin.vip.vendor')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.vip_vendors') }}
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcan
        @can('view-complaint', $user)
        <li>
            <a class="sidebar-header" href="{{route('admin.complaints')}}">
                <i data-feather="users"></i>
                <span>{{ __('adminNav.complaintes') }}</span>
            </a>
        </li>
        @endcan
        @can('view-support-tickets', $user)

        <li>
            <a class="sidebar-header" href="support-ticket.html"><i data-feather="phone"></i><span>{{ __('adminNav.support') }}</span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="{{route('admin.complaints.ticket')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.tickets') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.complaints.resolved')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.resolved_tickets') }}
                    </a>
                </li>
            </ul>
        </li>
        @endcan
        @can('view-reports', $user)
               <li>
            <a class="sidebar-header" href="support-ticket.html"><i data-feather="bar-chart"></i><span>{{ __('adminNav.reports') }}</span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="{{route('admin.sales-report')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.sales_reports') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.wallets-report')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.wallet_report') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.commissions-report')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.comm_report') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.expenses-report')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.expenses_report') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.profit-report')}}">
                        <i class="fa fa-circle"></i>{{ __('adminNav.profit_loss') }}
                    </a>
                </li>
            </ul>
        </li>
        @endcan

        @can('view-settings', $user)
        <li>
            <a class="sidebar-header" href="javascript:void(0)"><i data-feather="settings"></i><span>{{ __('adminNav.settings') }}</span><i
                    class="fa fa-angle-right pull-right"></i></a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="{{route('admin.categories')}}"><i class="fa fa-circle"></i>{{ __('adminNav.categories') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.delivery')}}"><i class="fa fa-circle"></i>{{ __('adminNav.delivery') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.regions')}}"><i class="fa fa-circle"></i>{{ __('adminNav.regions') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.attributes')}}"><i class="fa fa-circle"></i>{{ __('adminNav.attributes') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.cities')}}"><i class="fa fa-circle"></i>{{ __('adminNav.cities') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.reasons')}}"><i class="fa fa-circle"></i>{{ __('adminNav.reasons') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.markets')}}"><i class="fa fa-circle"></i>{{ __('adminNav.markets') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.roles')}}"><i class="fa fa-circle"></i>
                    {{ __('adminNav.roles') }}
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.users')}}"><i class="fa fa-circle"></i>
                    {{ __('adminNav.users') }}
                    </a>
                </li>
            </ul>
        </li>
        @endcan


      

        {{-- <li>
            <a class="sidebar-header" href="{{ route('password.request') }}">
                <i data-feather="key"></i>
                <span>{{ __('adminNav.forgot_pass') }}</span>
            </a>
        </li> --}}

       
        </ul>
    </div>
</div>
<!-- Page Sidebar Ends-->