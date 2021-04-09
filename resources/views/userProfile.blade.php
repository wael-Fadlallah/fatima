@extends('layouts.master')
@section('title','الئيسية')


@push('style')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/css-rtl/pages/dashboard-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/css-rtl/pages/card-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/css-rtl/plugins/tour/tour.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/css-rtl/pages/aggrid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/css-rtl/pages/app-user.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vadmin/app-assets/css-rtl/core/colors/palette-gradient.css')}}">

    <!-- END: Page CSS-->
@endpush


@push('scripts')
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('vadmin/app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
    <script src="https://unpkg.com/ag-grid-community/dist/ag-grid-community.min.js"></script>

    <!-- END: Page JS-->

@endpush

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">

                    <!-- Input Sizing start -->
                    <section id="input-sizing">
                        <div class="row match-height">

                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">الملف الشخصي</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="row">


                                                <div class="col-12">
                                                    <div class="text-bold-600 font-medium-2 mb-1">
                                                        الإسم
                                                    </div>
                                                    <fieldset class="form-label-group">
                                                        <input type="text" class="form-control" id="label-default" placeholder="" value="{{auth()->user()->name}}">

                                                    </fieldset>
                                                </div>

                                                <div class="col-12">
                                                    <div class="text-bold-600 font-medium-2 mb-1">
                                                        البريد الإلكتروني
                                                    </div>
                                                    <fieldset class="form-label-group">
                                                        <input type="text" class="form-control" id="label-default" placeholder="" value="{{auth()->user()->email}}">

                                                    </fieldset>
                                                </div>

                                                <button class="btn btn-primary">حفظ</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
                <!-- Dashboard Analytics end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
