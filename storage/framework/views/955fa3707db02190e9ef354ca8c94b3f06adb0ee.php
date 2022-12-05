<!DOCTYPE html>
<html lang="<?php echo e(LaravelLocalization::getCurrentLocale()); ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" href="<?php echo e(asset('main/images/new_logo.png')); ?>" type="image/png" />
    <link rel="shortcut icon" href="<?php echo e(asset('main/images/new_logo.png')); ?>" type="image/png" />
    <title><?php echo e(config('app.name', 'Oazri')); ?></title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('main/css/vendors/font-awesome.css')); ?>">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('main/css/vendors/slick.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('main/css/vendors/slick-theme.css')); ?>">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('main/css/vendors/animate.css')); ?>">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('main/css/vendors/themify-icons.css')); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('main/owl/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('main/owl/owl.theme.default.min.css')); ?>">
    

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('main/css/vendors/bootstrap.css')); ?>">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('main/css/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('main/css/custom.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('main/css/timber.css')); ?>">
    <style>
         .btn.dropdown-toggle:hover ,.btn:hover {
            background-color: none;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('main/css/changes.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('main/node_modules/@mdi/font/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('main/css/swiper-bundle.min.css')); ?>"/>
     <?php if(app()->getLocale() == 'ar'): ?> 
    <link rel="stylesheet" href="<?php echo e(asset('main/css/ar.css')); ?>">
    <?php endif; ?>
    
    <?php echo \Livewire\Livewire::styles(); ?>

</head>
<body id="theme-digital-mart-password-1" class="<?php echo e(LaravelLocalization::getCurrentLocaleDirection()); ?> disable_menutoggle left_sidebar false header_style_2  
theme-digital-mart-password-1   template-index <?php if(app()->getLocale() == 'ar'): ?> overflow-x  <?php endif; ?>" style="transform: none;">
    <?php echo $__env->make('main/partials/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('main/partials/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('main/partials/scr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</body>
</html>
<?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/main/layouts/app.blade.php ENDPATH**/ ?>