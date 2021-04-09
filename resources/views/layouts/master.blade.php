<!DOCTYPE html>
<html lang="en">
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>مركز فاطمة بنت محمد صلى اللًه عليه وسلم | @yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('vadmin/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('vadmin/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/vendors/css/vendors-rtl.min.css')}}">
{{--  <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/vendors/css/charts/apexcharts.css')}}">  --}}
{{--  <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/vendors/css/extensions/tether-theme-arrows.css')}}">  --}}
{{--  <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/vendors/css/extensions/tether.min.css')}}">  --}}
{{--  <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/vendors/css/extensions/shepherd-theme-default.css')}}">--}}
<!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/css-rtl/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/css-rtl/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/css-rtl/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/css-rtl/components.css')}}">
{{--  <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/css-rtl/themes/dark-layout.css')}}">--}}
{{--  <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/css-rtl/themes/semi-dark-layout.css')}}">--}}


<!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/css-rtl/custom-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/assets/css/style-rtl.css')}}">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>--}}
<!-- END: Custom CSS-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
        }
    </style>
    @stack('style')
    @stack('scripts')


    @laravelViewsStyles
    @livewireStyles


</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">

@auth
    @include('layouts.header')
    @include('layouts.menu')
@endauth
@include('layouts.content')
@include('layouts.footer')

@livewireScripts
@laravelViewsScripts
<script type="text/javascript">
    window.livewire.on('data-update', () => {
        $('.ModalCenter').modal('hide');
        $('.ModalCenterEdit').modal('hide');

    });
    window.livewire.on('data-deleted', () => {
        $('.DeleteModalCenter').modal('hide');
    });
    window.addEventListener('data-deleted', event => {
        $('.DeleteModalCenter').modal('hide');
    });
    window.addEventListener('open-updat', event => {

        $('#exampleModalCenter').modal('show')
        $('#editeModel').modal('show')
        $('#imageUpdate').modal('show')
    })

    window.addEventListener('open-delete', event => {

        $('#deleteData').modal('show')
    })

</script>
@stack('jsw')
</body>
<!-- END: Body-->

</html>
