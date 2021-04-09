@extends('layouts.master')
@section('title','home')


@push('style')
    <!-- BEGIN: Page CSS-->

    <!-- END: Page CSS-->
@endpush


@push('scripts')
    <!-- BEGIN: Page JS-->

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


                    <div class="card">
                        <div class="card-body">

                            @livewire('users.index')
                        </div>
                    </div>

                </section>
                <!-- Dashboard Analytics end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->



@endsection
