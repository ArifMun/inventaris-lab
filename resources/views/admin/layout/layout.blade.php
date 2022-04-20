<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Sistem Inventaris</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="/assets/img/psti.png" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands"
                ],
                urls: ['/assets/css/fonts.css']
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });

    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/azzara.min.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    {{-- <link rel="stylesheet" href="/assets/css/demo.css"> --}}
</head>
<style>
    .bg {
        background-color: #003356;
    }

</style>

<body>
    <div class="wrapper">
        <!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
        <div class="main-header" data-background-color="purple | blue">
            <div class="bg">
                <!-- Logo Header -->
                <div class="logo-header">
                    <a href="/dashboard" class="logo">
                        <img src="/assets/img/psti-logo.png" alt="navbar brand" class="navbar-brand" width="130px">
                    </a>
                    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                        data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="fa fa-bars"></i>
                        </span>
                    </button>
                    <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
                    <div class="navbar-minimize">
                        <button class="btn btn-minimize btn-rounded">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                </div>
                <!-- End Logo Header -->

                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-expand-lg">
                    <div class="container-fluid">
                        {{-- <div class="collapse" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1" value="search">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control" name="search"
                                    id="search">
                            </div>
                        </form>
                    </div> --}}
                        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                            <li class="nav-item toggle-nav-search hidden-caret">
                                <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
                                    aria-expanded="false" aria-controls="search-nav">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                    aria-expanded="false">
                                    <div class="u-text">
                                        <h4 class="text-light">Selamat Datang, {{ Auth::user()->nama }} <i
                                                class="fas fa-angle-down"></i> </h4>
                                    </div>
                                    {{-- <div class="avatar-sm">
                                    <img src="/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                                </div> --}}
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <li>
                                        {{-- <div class="dropdown-divider"></div> --}}
                                        <a class="dropdown-item" href="/"><i class="fa fa-home"></i> Beranda</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/logout"><i
                                                class="fa fa-arrow-alt-circle-left"></i>
                                            Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-wrapper scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav">
                        <li class="nav-item {{ Request()->is('dashboard')? 'active' : '' }}">
                            <a href="/dashboard">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Administrator</h4>
                        </li>
                        @if (Auth::user()->level == 'admin'||'superadmin')
                        @if (Auth::user()->level =='superadmin')
                        <li class="nav-item {{ Request()->is('user')? 'active' : '' }}">
                            <a href="/user">
                                <i class="fas fa-users"></i>
                                <p>Data Pengguna</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item {{ Request()->is('kategori')? 'active' : '' }}">
                            <a href="/kategori">
                                <i class="fas fa-tags"></i>
                                <p>Data Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item {{ Request()->is('barang')? 'active' : '' }}">
                            <a href="/barang">
                                <i class="fas fa-box"></i>
                                <p>Data Barang</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item {{ Request()->is('laporan')? 'active' : '' }}">
                        <a href="/laporan">
                            <i class="fas fa-file"></i>
                            <p>Laporan</p>
                        </a>
                        </li> --}}
                        <li class="nav-item {{ Request()->is('pengajuan')? 'active' : '' }}">
                            <a href="/pengajuan">
                                <i class="fas fa-file"></i>
                                <p>Pengajuan</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item   {{ Request()->is('laporan','laporan-pengajuan')? 'active' : '' }}">
                            <a data-toggle="collapse" href="#base">
                                <i class="fas fa-layer-group"></i>
                                <p>Laporan</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li class="nav-item  {{ Request()->is('laporan')? 'active' : '' }}">
                                        <a href="/laporan">
                                            <span class="sub-item">Laporan Barang</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  {{ Request()->is('laporan-pengajuan')? 'active' : '' }}">
                                        <a href="/laporan-pengajuan">
                                            <span class="sub-item">Laporan Pengajuan Barang</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    <!--   Core JS Files   -->
    <script src="/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    <!-- jQuery UI -->
    <script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <!-- Bootstrap Toggle -->
    <script src="/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    <!-- jQuery Scrollbar -->
    <script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="/assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- Azzara JS -->
    <script src="/assets/js/ready.min.js"></script>
    <!-- Azzara DEMO methods, don't include it in your project! -->
    <script src="/assets/js/setting-demo.js"></script>
    <script>
        $(document).ready(function () {
            $('#add-row').DataTable({

            });
        });

    </script>

</body>

</html>
@include('sweetalert::alert')
