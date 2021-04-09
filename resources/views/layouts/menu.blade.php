<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="/">
                    <div class="brand-logo"></div>

                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                        class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                        data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="/home"><i class="feather icon-home"></i><span class="menu-title"
                                                                                         data-i18n="Dashboard">الرئيسية</span></a>

            </li>
            @can('classes-controll')
                <li class=" nav-item"><a href="/classes"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                  data-i18n="List">الحلقات</span></a>
                </li>
            @endcan

{{--            @can('students-controll')--}}
                <li class=" nav-item"><a href="/students"><i class="fa fa-user"></i><span class="menu-title" data-i18n="User">الطالبات</span></a>

                </li>
{{--            @endcan--}}

            @can('teachers-controll')
                <li class=" nav-item"><a href="/teachers"><i class="fa fa-user"></i><span class="menu-title" data-i18n="User">المعلمات</span></a>
                </li>
            @endcan
            @can('users-controll')
                <li class=" nav-item"><a href="/users"><i class="fa fa-user"></i><span class="menu-title" data-i18n="User">المستخدمين</span></a>

                </li>
            @endcan
            @can('settings-controll')
                <li class=" nav-item"><a href="#"><i class="feather icon-settings"></i><span class="menu-title"
                                                                                             data-i18n="User">الإعدادات</span></a>
                    <ul class="menu-content">
                        <li><a href="/settings"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                         data-i18n="List">الاختام  </span></a>
                        @can('years-controll')
                            <li><a href="/years"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                          data-i18n="List">العام الدارسي</span></a>
                            </li>
                        @endcan
                        @can('levels-controll')
                            <li><a href="/levels"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                           data-i18n="List">المستويات</span></a>
                            </li>
                            @endcan

                            </li>
                            <li class=" nav-item"><a href="/profile"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                              data-i18n="List">الملف الشخصي</span></a>
                            </li>
                    </ul>

            @endcan




        </ul>
    </div>
</div>
<!-- END: Main Menu-->
