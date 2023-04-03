<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="dark" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-layout-mode="light" data-layout-width="fluid" data-layout-position="fixed" data-layout-style="detached">
<head>

    <meta charset="utf-8" />
    <title>@yield('title') | Fitness Guru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Fitness Guru" name="description" />
    <meta content="Themesbrand" name="author" />
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.5.3/dist/cleave.min.js"></script>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">

    <!-- jsvectormap css -->
    <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
    <!--datatable css-->
    <link rel="stylesheet" href="{{ asset('cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css') }}" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="{{ asset('cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/dropzone/dropzone.css') }}" type="text/css" />
    
    <!-- Filepond css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/filepond/filepond.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">


    <!--Swiper slider css-->
    <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        [data-layout="vertical"][data-sidebar="dark"] .navbar-nav .nav-link {
            color: #dcdde3;
        }
        [data-layout="vertical"][data-sidebar="dark"] .menu-title {
            color: #ffffff8c;
        }
        .active > .page-link, .page-link.active {
            z-index: 3;
            color: white;
            background-color: #4C965D;
            border-color: #4C965D;
        }
        /* @media screen and (min-width: 593px) {
            .week_style{
                display:flex;
            }
        } */

    </style>
    @yield('style')
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar" style="background-color: #418A52;">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="/" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="50">
                                </span>
                            </a>

                            <a href="/" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="50">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="dropdown ms-sm-3 header-item topbar-user" style="background: #257537">
                            <button type="button" class="btn shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/default.png') }}" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->name }}</span>
                                        <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Admin</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome {{ Auth::user()->name }}!</h6>
                                <a class="dropdown-item" href="#"><span class="align-middle">Profile</span></a>
                                <a class="dropdown-item" href="#"><span class="align-middle">Users</span></a>
                                <a class="dropdown-item" href="#"><span class="align-middle">Exercises</span></a>
                                <a class="dropdown-item" href="#"><span class="align-middle">Recepies</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu" style="background-color: #418A52">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('/') ? 'active' : '' }}" href="{{ URL::to('/') }}">
                                <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Dashboards</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('users') ? 'active' : '' }}" href="{{ URL::to('/users') }}">
                                <i class="bx bx-user"></i> <span data-key="t-dashboards">Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('excercise*') ? 'active' : '' }}" href="{{ URL::to('/excercise') }}">
                                <i class="bx bx-walk"></i> <span data-key="t-dashboards">Excercises</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('nutrition*') ? 'active' : '' }}" href="{{ URL::to('/nutrition') }}">
                                <i class="bx bx-cycling"></i> <span data-key="t-dashboards">Nutritions</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('settings') ? 'active' : '' }}" href="{{ URL::to('/settings') }}">
                                <i class="bx bx-cog"></i> <span data-key="t-dashboards">Setting</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('/') ? 'active' : '' }}" href="{{ URL::to('/logout') }}">
                                <i class="bx bx-log-out"></i> <span data-key="t-dashboards">Logout</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">Apps</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApps">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="apps-calendar.html" class="nav-link" data-key="t-calendar"> Calendar </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#sidebarEmail" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                            Email
                                        </a>
                                        <div class="collapse menu-dropdown" id="sidebarEmail">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="apps-mailbox.html" class="nav-link" data-key="t-mailbox"> Mailbox </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#sidebaremailTemplates" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebaremailTemplates" data-key="t-email-templates">
                                                        Email Templates
                                                    </a>
                                                    <div class="collapse menu-dropdown" id="sidebaremailTemplates">
                                                        <ul class="nav nav-sm flex-column">
                                                            <li class="nav-item">
                                                                <a href="apps-email-basic.html" class="nav-link" data-key="t-basic-action"> Basic Action </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="apps-email-ecommerce.html" class="nav-link" data-key="t-ecommerce-action"> Ecommerce Action </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
        @yield('content')
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <script>document.write(new Date().getFullYear())</script> © Fitness Guru.
                    </div>
                </div>
            </div>
        </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('assets/js/pages/dashboard-ecommerce.init.js') }}"></script>

    <!--datatable js-->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script src="{{ asset('cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-file-upload.init.js') }}"></script>

    <script src="{{ asset('assets/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>

    <script src="{{ asset('cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js') }}"></script>
    <script src="{{ asset('cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js') }}"></script>
    <script src="{{ asset('cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js') }}"></script>
    
    @yield('script')
</body>
</html>