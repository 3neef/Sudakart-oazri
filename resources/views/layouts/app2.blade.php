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
    @stack('styles')
    <title>Oazri | @yield('title')</title>

    @include('partials.styles')
</head>

<body class="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">

    <!-- page-wrapper Start-->
    <div class="page-wrapper">

        <!-- Page Header Start-->
        {{-- @include('partials.header') --}}
        <x-header-app />
        <!-- Page Header Ends -->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            @include('partials.menu')

            

            <div class="page-body">
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="page-header-left">
                                    <h3>@yield('title')
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
                                    <li class="breadcrumb-item active"> @yield('title')</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->

                {{-- content  --}}
                    @yield('content')
                {{-- end content --}}
            </div>

            <!-- footer start-->
            @include('partials.footer')
            <!-- footer end-->
        </div>
    </div>

    @include('partials.scripts')
    @stack('scripts')

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

</html>