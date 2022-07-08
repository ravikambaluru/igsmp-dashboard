<!doctype html>
<html lang="en" data-layout="vertical" data-layout-style="default" data-layout-width="fluid"
    data-sidebar-size="sm-hover" data-sidebar="light" data-topbar="dark" data-sidebar-size="lg"
    data-sidebar-image="logo-lg">



<head>

    <meta charset="utf-8" />
    <title>IGSMP Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" /> -->
    <!-- <meta content="Themesbrand" name="author" /> -->
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- jsvectormap css -->
    <link href="<?= base_url('assets/libs/jsvectormap/css/jsvectormap.min.css') ?>" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="<?= base_url('assets/libs/swiper/swiper-bundle.min.css') ?>" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="<?= base_url('assets/js/layout.js') ?>"></script>
    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/css/app.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= base_url('assets/css/custom.min.css') ?>" rel="stylesheet" type="text/css" />


</head>


<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box horizontal-logo">
                        <a href="<?= base_url() ?>">
                            <h3 class="text-white">IGSMP International</h3>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                        id="topnav-hamburger-icon">
                        <span class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>

                    <!-- App Search-->
                </div>

                <div class="d-flex align-items-center">


                    <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button"
                            class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                            <i class='bx bx-moon fs-22'></i>
                        </button>
                    </div>


                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                <img class="rounded-circle header-profile-user"
                                    src="<?= base_url('assets/images/users/user-dummy-img.jpg') ?>" alt="Header Avatar">
                                <span class="text-start ms-xl-2">
                                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Admin</span>

                                </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <h6 class="dropdown-header">Welcome Admin!</h6>
                            <a class="dropdown-item" href="auth-logout-basic.html"><i
                                    class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle" data-key="t-logout">Logout</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">

        <div id="scrollbar">
            <div class="container-fluid">

                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="<?= base_url('') ?>" href="#sidebarDashboards"
                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarDashboards">
                            <i class="ri-cloud-fill"></i> <span data-key="t-dashboards">Webinars</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarDashboards">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics">
                                        Registered Users </a>

                                </li>
                                <li class="nav-item">
                                    <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics">
                                        Abstract Submissions </a>

                                </li>
                            </ul>
                        </div>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('teams') ?>">
                            <i class="ri-team-fill"></i> <span data-key="t-dashboards">Team</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('teams') ?>">
                            <i class="ri-money-dollar-circle-fill"></i> <span data-key="t-dashboards">Pricing
                                Plans</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('teams') ?>">
                            <i class="ri-shield-user-fill"></i> <span data-key="t-dashboards">
                                Keynote Speakers
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('teams') ?>">
                            <i class="ri-service-fill"></i><span data-key="t-dashboards">
                                Collabrators
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('teams') ?>">
                            <i class="ri-chat-1-fill"></i><span data-key="t-dashboards">
                                Visitor Messages
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('teams') ?>">
                            <i class="ri-mail-volume-fill"></i><span data-key="t-dashboards">
                                Newsletter Subscribers
                            </span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- Sidebar -->
        </div>

        <div class="sidebar-background"></div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>