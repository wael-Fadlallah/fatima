@extends('layouts.login')
@section('title','login')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>

            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-12 col-12 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-12 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="{{asset('images/school_logo.svg')}}" width="40%" height="10%" alt="branding logo">
                                </div>
                                <div class="col-lg-12 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">تسجيل الدخول</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">مرحبًا بك من جديد ، يرجى تسجيل الدخول إلى حسابك.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form action="{{  route('login') }}" method="POST">
                                                    @csrf
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control" name="email"  id="user-name" placeholder="Username" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="user-name">البريد الإلكتروني</label>
                                                        @if ($errors->has('email'))
                                                            <div class="help-block form-text with-errors form-control-feedback">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </div>
                                                        @endif
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" name="password" class="form-control" id="user-password" placeholder="Password" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="user-password">كلمة المرور</label>
                                                        @if ($errors->has('password'))
                                                            <div class="help-block form-text with-errors form-control-feedback">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </div>
                                                        @endif
                                                    </fieldset>
                                                    <div class="form-group d-flex justify-content-between align-items-center">
                                                        <div class="text-left">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">تذكرني</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
{{--                                                        <div class="text-right"><a href="{{ route('password.request') }}" class="card-link">نسيت كلمة المرور ?</a></div>--}}
                                                    </div>

                                                    <button type="submit" class="btn btn-primary float-right btn-inline">دخول</button>
                                                </form>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
