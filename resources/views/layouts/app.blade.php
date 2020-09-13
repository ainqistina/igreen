<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="shortcut icon" href="{{ asset('mpk1.ico') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'iGreen') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/sb-admin-2.js') }}" defer></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js" type="text/javascript" charset="utf8"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link  href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body id="page-top">

    @auth
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a href="" class="navbar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-3" style="color:black;"><img src="../img/mpk.png" width="95%" />
                    <br>iGreen
                </div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a style="color:black;" class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-home" style="color:black;"></i>
                    <span>Halaman Utama</span></a>
            </li>
            <hr class="sidebar-divider">
            <div style="color: black" class="sidebar-heading">Menu</div>
            <li class="nav-item">
                <a style="color:black;" class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo">
                    <i style="color:black;" class="fas fa-fw fa-cog"></i>
                    <span>Selenggara</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a style="color:black;" class="collapse-item" href="{{ route('taman') }}">Taman</a>
                        <a style="color:black;" class="collapse-item" href="{{ route('jalan') }}">Jalan</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a style="color:black;" class="nav-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="false" aria-controls="collapseThree">
                    <i style="color:black;" class="fas fa-fw fa-book"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a style="color:black;" class="collapse-item" href="{{ route('cariSisa') }}">Pengurusan Sisa
                            Pepejal</a>
                        <a style="color:black;" class="collapse-item" href="{{ route('cariAwam') }}">Pembersihan
                            Awam</a>
                        <a style="color:black;" class="collapse-item" href="{{ route('cariRekod') }}">Rekod CCC</a>
                    </div>
                </div>
            </li>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand-lg navbar-light bg-light topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                                </div>
                            </form>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="../img/logout.png">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Log Keluar
                                </a>
                            </div>
                            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Anda Pasti?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button"
                                                data-dismiss="modal">Batal</button>
                                            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                {{ __('Log Keluar') }}
                                            </a>
    
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
                <main>
                    @yield('content')
                </main>
                <footer class="sticky-footer">
                    <div class="container">
                        <div class="copyright text-center py-auto">
                            <span>Hakcipta Terpelihara &copy; iGreen 2020 Majlis Perbandaran Kluang</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/action.js') }}"></script>
    @endauth

    @guest
    <main class="py-0">
        @yield('content')
    </main>
    <footer class="sticky-footer">
        <div class="container">
            <div class="copyright text-center py-auto">
                <span>Hakcipta Terpelihara &copy; iGreen 2020 Majlis Perbandaran Kluang</span>
            </div>
        </div>
    </footer>
    @endguest

    <script type="text/javascript">
        var app_url={!! json_encode(url('/')) !!};
    </script>

    <script src="{{asset('js/app.js')}}"></script>

</body>

</html>