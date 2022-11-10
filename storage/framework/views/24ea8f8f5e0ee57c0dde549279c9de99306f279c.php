
<?php $__env->startSection('content'); ?>
 <!-- breadcrumb start -->
 <div class="breadcrumb-section bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2><?php echo e(__('body.profile')); ?></h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><?php echo e(__('body.home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('body.profile')); ?></li>
                    </ol>
                </nav>
            </div>
            <?php echo $__env->make('main/partials/profile-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-md-9">
                <div class="profile-details">
                    
                    <div class="user-data">
                        <h1 class="h5">
                            <?php echo e(Auth::guard('web')->user()->userable->name); ?>

                        </h1>
                        <h3 class="h6 text-secondary">
                            #<?php echo e(Auth::guard('web')->user()->userable->id); ?>

                        </h3>
                    </div>
                    <div class="profile-area-box">
                        <div>
                            <img src="<?php echo e(asset('main/images/profile/profile.jpg')); ?>" style="width : 150px; height:150px" alt="">
                        </div>
                        <div class="p-2">
                                <ul>
                               
                                    <li class="profile-info"><?php echo e(__('body.phone')); ?> : <?php echo e(Auth::guard('web')->user()->phone); ?></li>
                                    <li class="profile-info"><?php echo e(__('body.Second_Phone')); ?> : <?php echo e(Auth::guard('web')->user()->userable->secondary_phone); ?></li>
                               
                                    <li class="profile-info"><?php echo e(__('body.email')); ?> : <?php echo e(Auth::guard('web')->user()->email); ?></li>
                                    
                                
                                    <li class="profile-info"><?php echo e(__('body.Orders')); ?> : <?php echo e($customer->first()->orders_count); ?></li>
                                    
                                </ul>
                                
                        </div>

                        
                    </div>
                    

                   
                    <a href="<?php echo e(route('profile.showUpdatePassword')); ?>" class="btn btn-danger"><?php echo e(__('body.reset_password')); ?></a>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/main/profile/index.blade.php ENDPATH**/ ?>