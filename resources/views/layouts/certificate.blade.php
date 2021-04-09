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

    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet">



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


@yield('scripts')
</body>
</html>
