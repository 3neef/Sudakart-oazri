<div class="page-main-header">
    <div class="main-header-right row">
        <div class="main-header-left d-lg-none w-auto">
            <div class="logo-wrapper">
                <a href="<?php echo e(route('admin.dashboard')); ?>">
                    <img class="blur-up lazyloaded d-block d-lg-none"
                        src="<?php echo e(asset('main/images/new_logo.png')); ?>" alt="">
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
                            
                                <?php if(app()->getLocale() == 'ar'): ?>
                                    <a hreflang="en"  href="<?php echo e(LaravelLocalization::getLocalizedURL('en', null, [], true)); ?>"> English
                                    </a>
                                        
                                <?php else: ?>
                                    <a hreflang="ar"  href="<?php echo e(LaravelLocalization::getLocalizedURL('ar', null, [], true)); ?>"> العربية 
                                    </a>
                                <?php endif; ?>
                        </li>
                <li class="onhover-dropdown">
                    <i data-feather="bell"></i>
                    <span class="badge badge-pill badge-primary pull-right notification-badge"><?php echo e($notifications->where('is_opened', 0)->count()); ?></span>
                    <span class="dot"></span>
                    <ul class="notification-dropdown onhover-show-div p-0">
                        <li><?php echo e(__('body.notifications')); ?> <span class="badge badge-pill badge-primary pull-right"><?php echo e($notifications->where('is_opened', 0)->count()); ?></span></li>
                        <?php $__empty_1 = true; $__currentLoopData = $notifications->where('is_opened', 0)->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li>
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mt-0">
                                        <span>
                                            <i class="shopping-color" data-feather="shopping-bag"></i>
                                        </span><?php echo e($notification->title); ?>

                                    </h6>
                                    <p class="mb-0"><?php echo e($notification->message); ?></p>
                                </div>
                            </div>
                        </li>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <li>
                                <p><?php echo e(__('adminBody.no_notifications')); ?></p>
                            </li> 
                        <?php endif; ?>
                        <li class="txt-dark"><a href="<?php echo e(route('admin.pushnotifications')); ?>"><?php echo e(__('adminBody.all')); ?></a> <?php echo e(__('body.notifications')); ?></li>
                    </ul>
                </li>
                <li class="onhover-dropdown">
                    <div class="media align-items-center">
                        <img class="align-self-center pull-right img-50 blur-up lazyloaded"
                            src="<?php echo e(asset('images/arab.png')); ?>" alt="header-user">
                        <div class="dotted-animation">
                            <span class="animate-circle"></span>
                            <span class="main-circle"></span>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                        <li>
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <a href="<?php echo e(route('logout')); ?>"  onclick="event.preventDefault();
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
</div><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/components/header-app.blade.php ENDPATH**/ ?>