<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>ركز فاطمة بنت محمد صلى اللًه عليه وسلم  | @yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{  asset('vendors') }}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{  asset('vendors') }}/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{  asset('vendors') }}/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{  asset('vendors') }}/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link href="{{  asset('vendors') }}/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="{{  asset('') }}css/custom.min.css" rel="stylesheet">



  </head>

  <body  style="background: white">
    <div class="container body">



        <!-- page content -->
        <div class="text-center center" width="100%" role="main">
            @yield('content')
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{  asset('vendors') }}/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{  asset('vendors') }}/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="{{  asset('vendors') }}/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="{{  asset('vendors') }}/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="{{  asset('vendors') }}/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="{{  asset('vendors') }}/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="{{  asset('vendors') }}/Flot/jquery.flot.js"></script>
    <script src="{{  asset('vendors') }}/Flot/jquery.flot.pie.js"></script>
    <script src="{{  asset('vendors') }}/Flot/jquery.flot.time.js"></script>
    <script src="{{  asset('vendors') }}/Flot/jquery.flot.stack.js"></script>
    <script src="{{  asset('vendors') }}/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="{{  asset('vendors') }}/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="{{  asset('vendors') }}/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="{{  asset('vendors') }}/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="{{  asset('vendors') }}/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{  asset('vendors') }}/moment/min/moment.min.js"></script>
    <script src="{{  asset('vendors') }}/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="{{  asset('vendors') }}/datatables.net/js/jquery.dataTables.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{  asset('') }}js/custom.min.js" defer></script>

    @yield('scripts')
  </body>
</html>
