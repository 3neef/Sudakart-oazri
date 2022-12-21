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
    <link rel="icon" href="<?php echo e(asset('main/images/new_logo.png')); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo e(asset('main/images/new_logo.png')); ?>" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php echo $__env->yieldPushContent('styles'); ?>
    <title>Oazri | <?php echo $__env->yieldContent('title'); ?></title>

    <?php echo $__env->make('partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
</head>

<body class="<?php echo e(app()->getLocale() == 'ar' ? 'rtl' : ''); ?>">

    

   

    <div class="loader">
        <div class="loader-inner">
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
        </div>
    </div>




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
                                        <small><?php echo e(__('footer.oazri_online_store')); ?></small>
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
        
        
        <script>
            const loaderContainer = document.querySelector('.loader');
            window.addEventListener('load', () => {
                loaderContainer.style.display = 'none';
            });
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
        <script>
        var points = [],
            velocity2 = 5, // velocity squared
            canvas = 
        document.getElementById('container'),
        context = canvas.getContext('2d'),
        radius = 5,
        boundaryX = 200,
        boundaryY = 200,
        numberOfPoints = 30;

        init();

        function init() {
        // create points
        for (var i = 0; i<numberOfPoints; i++) {
            createPoint();
        }
        // create connections
        for (var i = 0, l=points.length; i<l; i++) {
            var point = points[i];
            if(i == 0) {
            points[i].buddy = points[points.length-1];
            } else {
            points[i].buddy = points[i-1];
            }
        }
        
        // animate
        animate();
        }

        function createPoint() {
        var point = {}, vx2, vy2;
        point.x = Math.random()*boundaryX;
        point.y = Math.random()*boundaryY;
        // random vx 
        point.vx = (Math.floor(Math.random())*2-1)*Math.random();
        vx2 = Math.pow(point.vx, 2);
        // vy^2 = velocity^2 - vx^2
        vy2 = velocity2 - vx2;
        point.vy = Math.sqrt(vy2) * (Math.random()*2-1);
        points.push(point);
        }

        function resetVelocity(point, axis, dir) {
        var vx, vy;
        if(axis == 'x') {
            point.vx = dir*Math.random();  
            vx2 = Math.pow(point.vx, 2);
        // vy^2 = velocity^2 - vx^2
        vy2 = velocity2 - vx2;
        point.vy = Math.sqrt(vy2) * (Math.random()*2-1);
        } else {
            point.vy = dir*Math.random();  
            vy2 = Math.pow(point.vy, 2);
        // vy^2 = velocity^2 - vx^2
        vx2 = velocity2 - vy2;
        point.vx = Math.sqrt(vx2) * (Math.random()*2-1);
        }
        }

        function drawCircle(x, y) {
        context.beginPath();
        context.arc(x, y, radius, 0, 2 * Math.PI, false);
        context.fillStyle = '#97badc';
        context.fill();  
        }

        function drawLine(x1, y1, x2, y2) {
        context.beginPath();
        context.moveTo(x1, y1);
        context.lineTo(x2, y2);
        context.strokeStyle = '#8ab2d8'
        context.stroke();
        }  

        function draw() {
        for(var i =0, l=points.length; i<l; i++) {
            // circles
            var point = points[i];
            point.x += point.vx;
            point.y += point.vy;
            drawCircle(point.x, point.y);
            // lines
            drawLine(point.x, point.y, point.buddy.x, point.buddy.y);
            // check for edge
            if(point.x < 0+radius) {
            resetVelocity(point, 'x', 1);
            } else if(point.x > boundaryX-radius) {
            resetVelocity(point, 'x', -1);
            } else if(point.y < 0+radius) {
            resetVelocity(point, 'y', 1);
            } else if(point.y > boundaryY-radius) {
            resetVelocity(point, 'y', -1);
            } 
        }
        }

        function animate() {
        context.clearRect ( 0 , 0 , 200 , 200 );
        draw();
        requestAnimationFrame(animate);
        }
        </script>

        <script>
            $(document).ready(function() {
                toastr.options.timeOut = 1000;
                <?php if(Session::has('error')): ?>
                    toastr.error('<?php echo e(Session::get('error')); ?>');
                <?php elseif(Session::has('success')): ?>
                    toastr.success('<?php echo e(Session::get('success')); ?>');
                <?php elseif(Session::has('warning')): ?>
                    toastr.warning('<?php echo e(Session::get('warning')); ?>');
                <?php endif; ?>
            });
    
        </script>
</body>

</html><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/layouts/app2.blade.php ENDPATH**/ ?>