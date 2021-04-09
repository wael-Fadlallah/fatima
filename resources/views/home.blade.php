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
                    {{-- Dashboard Ecommerce Starts --}}
                    <section id="dashboard-ecommerce">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header d-flex flex-column align-items-start pb-0">
                                        <div class="avatar bg-rgba-primary p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-users text-primary font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700 mt-1">{{\App\Models\User::all()->count()}}</h2>
                                        <p class="mb-0">مستخدم</p>
                                    </div>
                                    <div class="card-content">
                                        <div id="line-area-chart-1"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header d-flex flex-column align-items-start pb-0">
                                        <div class="avatar bg-rgba-primary p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-users text-primary font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700 mt-1">{{\App\Models\Teacher::all()->count()}}</h2>
                                        <p class="mb-0">استاذه</p>
                                    </div>
                                    <div class="card-content">
                                        <div id="line-area-chart-1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header d-flex flex-column align-items-start pb-0">
                                        <div class="avatar bg-rgba-primary p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-package text-warning font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700 mt-1">{{\App\Models\ClassModel::all()->count()}}</h2>
                                        <p class="mb-0">حلقة</p>
                                    </div>
                                    <div class="card-content">
                                        <div id="line-area-chart-1"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header d-flex flex-column align-items-start pb-0">
                                        <div class="avatar bg-rgba-primary p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-package text-warning font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700 mt-1">{{\App\Models\Level::all()->count()}}</h2>
                                        <p class="mb-0">مستوي</p>
                                    </div>
                                    <div class="card-content">
                                        <div id="line-area-chart-1"></div>
                                    </div>
                                </div>
                            </div>

                            </div>





                    </section>
                    {{-- Dashboard Ecommerce ends --}}
                </section>
                <!-- Dashboard Analytics end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
