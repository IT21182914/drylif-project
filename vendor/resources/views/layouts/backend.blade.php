<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description"
        content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title', 'Dashboard | Irhachan')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/icon/favicon.svg') }}">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/vendors/css/extensions/dragula.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/themes/semi-dark-layout.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/pages/dashboard-analytics.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/style.css') }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body
    class="vertical-layout vertical-menu-modern boxicon-layout no-card-shadow 2-columns  navbar-sticky footer-static  "
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <div class="header-navbar-shadow"></div>
    <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top ">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">

                    </div>
                    <ul class="nav navbar-nav float-right">

                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                    class="ficon bx bx-fullscreen"></i></a></li>

                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#"
                                data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span
                                        class="user-name">{{ Auth::user()->name }}</span></div>
                                <span><img class="round" src="{{ asset('assets/img/icon/favicon.svg') }}"
                                        alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right pb-0"><a class="dropdown-item"
                                    href="/profile"><i class="bx bx-user mr-50"></i> Edit Profile</a>

                                <div class="dropdown-divider mb-0"></div>
                                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                    @csrf
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="bx bx-power-off mr-50"></i> Logout
                                    </a>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="/dashboard">
                        <div class="brand-logo"><img class="logo" src="{{ asset('assets/img/logo/logo.svg') }}"
                                style="width: 200px" />
                        </div>

                    </a></li>

            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
                data-icon-style="">
                <li class=" nav-item"><a href="/dashboard"><i class="bx bx-home-alt"></i><span class="menu-title"
                            data-i18n="Dashboard">Dashboard</span></a>

                </li>

                <li class=" navigation-header"><span>Apps</span>
                </li>
                <li class=" nav-item"><a href="#"><i class="bx bx-file"></i><span class="menu-title"
                            data-i18n="Categories">Categories</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('category.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item" data-i18n="Category List">Category List</span></a>
                        </li>
                        <li><a href="{{ route('sub_category.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item" data-i18n="Sub-Category List">Sub-Category List</span></a>
                        </li>
                        <li><a href="{{ route('sub_category_service.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item"
                                    data-i18n="Sub-Category Service">Sub-Category Service</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a href="{{ route('service.index') }}"><i class="bx bx-file"></i><span
                            class="menu-title" data-i18n="Services">Services</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('client.index') }}"><i class="bx bx-file"></i><span
                            class="menu-title" data-i18n="Client">Client</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('partner.index') }}"><i class="bx bx-file"></i></i><span
                            class="menu-title" data-i18n="Partner">Partner</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('testimonial.index') }}"><i class="bx bx-file"></i><span
                            class="menu-title" data-i18n="Testimonial">Testimonial</span></a>
                </li>

                <li class=" navigation-header"><span>Company</span>
                </li>
                <li class=" nav-item"><a href="#"><i class="bx bx-file"></i><span class="menu-title"
                            data-i18n="Categories">About Company</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('company.edit', 1) }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item" data-i18n="Company Details">Company Details</span></a>
                        </li>
                        <li><a href="{{ route('social.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item" data-i18n="Social Links">Social Links</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a href="{{ route('contact.index') }}"><i class="bx bx-file"></i><span
                            class="menu-title" data-i18n="Contact Form">Contact Form</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
    @yield('content')
    <!-- BEGIN: Content-->

    <!-- END: Content-->


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-left d-inline-block">2024 &copy; Irhachan</span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i
                    class="bx bx-up-arrow-alt"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('backend/app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js') }}"></script>
    <script src="{{ asset('backend/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js') }}"></script>
    <script src="{{ asset('backend/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('backend/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/extensions/dragula.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('backend/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/scripts/components.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/scripts/footer.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('backend/app-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>
    <!-- END: Page JS-->
    <script src="{{ asset('backend/app-assets/js/scripts/forms/form-repeater.js') }}"></script>

</body>
<!-- END: Body-->

</html>
