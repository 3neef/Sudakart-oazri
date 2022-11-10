<!-- Page Sidebar Start-->
<?php
$user = Auth::user();
?>
<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper">
            <img class="img-60" src="<?php echo e(asset('images/arab.png')); ?>" alt="#">
            <div>
                <h6 class="f-14"><?php echo e(auth()->user()->userable->first_name); ?></h6>
                <p><?php echo e($user->roles->toArray()[0]['name']); ?></p>
            </div>
        </div>
    </div>
    <div class="sidebar custom-scrollbar">
        <a href="javascript:void(0)" class="sidebar-back d-lg-none d-block"><i class="fa fa-times"
                aria-hidden="true"></i></a>
        <ul class="sidebar-menu">
            <li>
                <a class="sidebar-header" href="<?php echo e(route('admin.dashboard')); ?>">
                    <i data-feather="home"></i>
                    <span><?php echo e(__('adminNav.dashboard')); ?></span>
                </a>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-products', $user)): ?>
            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="box"></i>
                    <span><?php echo e(__('adminNav.products')); ?></span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul class="sidebar-submenu">

                    <li>
                        <a href="<?php echo e(route('admin.products.index')); ?>">
                            <i class="fa fa-circle"></i>
                            <span><?php echo e(__('adminNav.all_products')); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.products.stoped')); ?>">
                            <i class="fa fa-circle"></i>
                            <span><?php echo e(__('adminNav.sus_products')); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.products.rates')); ?>">
                            <i class="fa fa-circle"></i>
                            <span><?php echo e(__('adminNav.product_review')); ?></span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-orders', $user)): ?>
            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="archive"></i>
                    <span><?php echo e(__('adminNav.orders')); ?></span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="<?php echo e(route('admin.orders.index')); ?>">
                            <i class="fa fa-circle"></i>
                            <span><?php echo e(__('adminNav.order_list')); ?></span>
                        </a>
                    </li>

                    

            <li>
                <a href="<?php echo e(route('admin.orders.canceled')); ?>">
                    <i class="fa fa-circle"></i>
                    <span><?php echo e(__('adminNav.canceled_orders')); ?></span>
                </a>
            </li>

            <li>
                <a href="<?php echo e(route('admin.orders.returned')); ?>">
                    <i class="fa fa-circle"></i>
                    <span><?php echo e(__('adminNav.returned_products')); ?></span>
                </a>
            </li>
        </ul>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-payments', $user)): ?>
        <li>
            <a class="sidebar-header" href="javascript:void(0)">
                <i data-feather="dollar-sign"></i>
                <span><?php echo e(__('adminNav.accounting')); ?></span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="<?php echo e(route('admin.accounting.payments')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.payments')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.accounting.wallets')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.wallets')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.accounting.transactions')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.transactions')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.accounting.expenses')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.expenses')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.accounting.expensetypes')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.expenses_type')); ?>

                    </a>
                </li>
            </ul>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-vendors', $user)): ?>
        <li>
            <a class="sidebar-header" href="javascript:void(0)">
                <i data-feather="tag"></i>
                <span><?php echo e(__('adminNav.vendors')); ?></span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="<?php echo e(route('admin.vendors')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.vendor_list')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.vendors.pending')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.pending_vendors')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.vendors.pending.categories')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.category_requests')); ?>

                    </a>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-vendors', $user)): ?>
                <li>
                    <a href="<?php echo e(route('admin.vendors.suspended')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.sus_vendors')); ?>

                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-promotions', $user)): ?>

        <li>
            <a class="sidebar-header" href="javascript:void(0)">
                <i data-feather="clipboard"></i>
                <span><?php echo e(__('adminNav.promotions')); ?></span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="<?php echo e(route('admin.offers')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.offers')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.coupons')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.cupon')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.blogs')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.blogs')); ?>

                    </a>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-ads', $user)): ?>
                <li>
                    <a href="<?php echo e(route('admin.ads')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.ads')); ?>

                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-push-notification', $user)): ?>
                <li>
                    <a href="<?php echo e(route('admin.pushnotifications')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.notifications')); ?>

                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-upselling')): ?>
                <li>
                    <a href="<?php echo e(route('admin.upselling')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.upselling')); ?>

                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-customers', $user)): ?>
        <li>
            <a class="sidebar-header" href="javascript:void(0)">
                <i data-feather="align-left"></i>
                <span><?php echo e(__('adminNav.customers')); ?></span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="<?php echo e(route('admin.customers')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.customer_list')); ?>

                    </a>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-vip-customers', $user)): ?>
                <li>
                    <a href="<?php echo e(route('admin.customers.vip')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.vip_customer')); ?>

                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-data-analysis', $user)): ?>
        <li>
            <a class="sidebar-header" href="javascript:void(0)">
                <i data-feather="user-plus"></i>
                <span><?php echo e(__('adminNav.data_ana')); ?></span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="<?php echo e(route('admin.products.get.mostviewed')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.most_viewed_product')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.products.mostsold')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.most_sold_products')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.blogs.mostviewed')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.most_viewed_blogs')); ?>

                    </a>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('data-analysis-vip-vendors', $user)): ?>
                <li>
                    <a href="<?php echo e(route('admin.vip.vendor')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.vip_vendors')); ?>

                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-complaint', $user)): ?>
        <li>
            <a class="sidebar-header" href="<?php echo e(route('admin.complaints')); ?>">
                <i data-feather="users"></i>
                <span><?php echo e(__('adminNav.complaintes')); ?></span>
            </a>
        </li>
        <?php endif; ?>


        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-support-tickets', $user)): ?>

        <li>
            <a class="sidebar-header" href="support-ticket.html"><i data-feather="phone"></i><span><?php echo e(__('adminNav.support')); ?></span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="<?php echo e(route('admin.complaints.ticket')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.tickets')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.complaints.resolved')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.resolved_tickets')); ?>

                    </a>
                </li>
            </ul>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-reports', $user)): ?>
               <li>
            <a class="sidebar-header" href="support-ticket.html"><i data-feather="bar-chart"></i><span><?php echo e(__('adminNav.reports')); ?></span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="<?php echo e(route('admin.sales-report')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.sales_reports')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.wallets-report')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.wallet_report')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.commissions-report')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.comm_report')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.expenses-report')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.expenses_report')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.profit-report')); ?>">
                        <i class="fa fa-circle"></i><?php echo e(__('adminNav.profit_loss')); ?>

                    </a>
                </li>
            </ul>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-settings', $user)): ?>
        <li>
            <a class="sidebar-header" href="javascript:void(0)"><i data-feather="settings"></i><span><?php echo e(__('adminNav.settings')); ?></span><i
                    class="fa fa-angle-right pull-right"></i></a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="<?php echo e(route('admin.categories')); ?>"><i class="fa fa-circle"></i><?php echo e(__('adminNav.categories')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.delivery')); ?>"><i class="fa fa-circle"></i><?php echo e(__('adminNav.delivery')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.regions')); ?>"><i class="fa fa-circle"></i><?php echo e(__('adminNav.regions')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.attributes')); ?>"><i class="fa fa-circle"></i><?php echo e(__('adminNav.attributes')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.commissions')); ?>"><i class="fa fa-circle"></i><?php echo e(__('adminNav.commissions')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.reasons')); ?>"><i class="fa fa-circle"></i><?php echo e(__('adminNav.reasons')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.roles')); ?>"><i class="fa fa-circle"></i>
                    <?php echo e(__('adminNav.roles')); ?>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.users')); ?>"><i class="fa fa-circle"></i>
                    <?php echo e(__('adminNav.users')); ?>

                    </a>
                </li>
            </ul>
        </li>
        <?php endif; ?>


      

        

       
        </ul>
    </div>
</div>
<!-- Page Sidebar Ends--><?php /**PATH /var/www/html/sudakart/resources/views/partials/menu.blade.php ENDPATH**/ ?>