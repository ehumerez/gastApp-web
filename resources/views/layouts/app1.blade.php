<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>HUMCORP | Tablero</title>

    <link href="{{ asset('site/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('site/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset('site/js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">

    <link href="{{ asset('site/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">
    @stack('head')
</head>

<body>
    <div id="wrapper">
        @include('layouts.navigation')

        <div id="page-wrapper" class="gray-bg dashbard-2">

            @include('layouts.topnavbar')

            @yield('content')

            @include('layouts.footer')
        </div>
    </div>

        @include('layouts.chat')
        @include('layouts.rightsidebar')


    <!-- Mainly scripts -->
    <script src="{{ asset('site/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('site/js/funciones.js') }}"></script>
    @stack('scripts')

    <script src="{{ asset('site/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('site/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('site/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('site/js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('site/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('site/js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('site/js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('site/js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('site/js/plugins/flot/jquery.flot.symbol.js') }}"></script>
    <script src="{{ asset('site/js/plugins/flot/jquery.flot.time.js') }}"></script>

    <!-- Peity -->
    <script src="{{ asset('site/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('site/js/demo/peity-demo.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('site/js/inspinia.js') }}"></script>
    <script src="{{ asset('site/js/plugins/pace/pace.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('site/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- GITTER -->
    <script src="{{ asset('site/js/plugins/gritter/jquery.gritter.min.js') }}"></script>

    <!-- Jvectormap -->
    <script src="{{ asset('site/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('site/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- EayPIE -->
    <script src="{{ asset('site/js/plugins/easypiechart/jquery.easypiechart.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset('site/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{ asset('site/js/demo/sparkline-demo.js') }}"></script>

    <!-- ChartJS-->
    <script src="{{ asset('site/js/plugins/chartJs/Chart.min.js') }}"></script>

    <!-- Toastr -->
    <script src="{{ asset('site/js/plugins/toastr/toastr.min.js') }}"></script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script',"{{ asset('site/www.google-analytics.com/analytics.js') }}",'ga');

        ga('create', 'UA-4625583-2', 'webapplayers.com');
        ga('send', 'pageview');
    </script>
</body>
</html>
