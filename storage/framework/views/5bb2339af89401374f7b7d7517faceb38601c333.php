<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/dashboard/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/dashboard/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php echo $__env->yieldPushContent('styles'); ?>
    <title>Oazri | <?php echo $__env->yieldContent('title'); ?></title>

    <?php echo $__env->make('partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="<?php echo e(app()->getLocale() == 'ar' ? 'rtl' : ''); ?>">

    <!-- page-wrapper Start-->
    <div class="page-wrapper">

        <!-- Page Header Start-->
        
        <?php if (isset($component)) { $__componentOriginal30c9673676a2f6b2f62a5d3926938c336605ee9c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\HeaderApp::class, []); ?>
<?php $component->withName('header-app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal30c9673676a2f6b2f62a5d3926938c336605ee9c)): ?>
<?php $component = $__componentOriginal30c9673676a2f6b2f62a5d3926938c336605ee9c; ?>
<?php unset($__componentOriginal30c9673676a2f6b2f62a5d3926938c336605ee9c); ?>
<?php endif; ?>
        <!-- Page Header Ends -->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            <?php echo $__env->make('partials.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            

            <div class="page-body">
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="page-header-left">
                                    <h3><?php echo $__env->yieldContent('title'); ?>
                                        <small>Oazri Admin panel</small>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ol class="breadcrumb pull-right">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <i data-feather="home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active"> <?php echo $__env->yieldContent('title'); ?></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->

                
                    <?php echo $__env->yieldContent('content'); ?>
                
            </div>

            <!-- footer start-->
            <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- footer end-->
        </div>
    </div>

    <?php echo $__env->make('partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>

    <script>
        function newTabImage() {
    var image = new Image();
    image.src = $('#idimage').attr('src');

    var w = window.open("",'_blank');
    w.document.write(image.outerHTML);
    w.document.close(); 
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });

    function selectAll() {
    $('.js-example-basic-multiple > option').prop("selected", true);
    $('.js-example-basic-multiple').trigger("change");
    }
    function deselectAll() {
    $('.js-example-basic-multiple > option').prop("selected", false);
    $('.js-example-basic-multiple').trigger("change");
    }
    </script>
</body>

</html><?php /**PATH /var/www/html/sudakart/resources/views/layouts/app2.blade.php ENDPATH**/ ?>