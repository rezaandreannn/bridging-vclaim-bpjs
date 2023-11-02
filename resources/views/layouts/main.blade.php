<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Layout &rsaquo; Top Navigation &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    @stack('css-libraries')
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/ionicons201/css/ionicons.min.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('stisla/assets/css/components.css')}}">

    <!-- Spesific CSS -->
    @stack('css-spesific')


    <!-- /END GA -->
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <nav class="navbar navbar-expand-lg bg-primary">
                <a class="navbar-brand" href="#">E-CLAIM</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Peserta</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                SEP
                            </a>
                            <div class="dropdown-menu">
                                {{-- <a class="dropdown-item" href="{{ route('sep.cari')}}">Cari SEP</a> --}}
                                {{-- <a class="dropdown-item" href="#">Hapus SEP</a> --}}
                                <div class="dropdown-divider"></div>
                                {{-- <a class="dropdown-item" href="#">History SEP</a> --}}
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                Rujukan
                            </a>
                            <div class="dropdown-menu">

                            </div>
                        </li>
                        <li class="nav-item dropdown {{ request()->is('monitoring*') ? 'active' : ''}}">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                Monitoring
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item {{ request()->is('monitoring/kunjungan*') ? 'active' : ''}}" href="{{ route('monitoring.kunjungan')}}">Data Kunjungan</a>
                                <a class="dropdown-item {{ request()->is('monitoring/klaim*') ? 'active' : ''}}" href="{{ route('monitoring.klaim')}}">Data Klaim</a>
                                <a class="dropdown-item" href="#">Histori Peserta</a>
                                <a class="dropdown-item" href="#">Data Klaim Jasa Raharja</a>
                                <div class="dropdown-divider"></div>
                                {{-- <a class="dropdown-item" href="#">History SEP</a> --}}
                            </div>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link disabled" href="#">Rujukan</a>
                        </li> --}}
                    </ul>
                    <form class="form-inline ml-auto">

                    </form>
                    <ul class="navbar-nav navbar-right">
                        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                                <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-title">Logged in 5 min ago</div>
                                <a href="features-profile.html" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Profile
                                </a>
                                <a href="features-activities.html" class="dropdown-item has-icon">
                                    <i class="fas fa-bolt"></i> Activities
                                </a>
                                <a href="features-settings.html" class="dropdown-item has-icon">
                                    <i class="fas fa-cog"></i> Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body" style="margin-top: -50px;">
                        {{ $slot }}
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('stisla/assets/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    @stack('js-libraries')

    <!-- Template JS File -->
    <script src="{{ asset('stisla/assets/js/scripts.js')}}"></script>
    <script src="{{ asset('stisla/assets/js/custom.js')}}"></script>

    <!-- Page Specific JS File -->
    @stack('js-spesific')
</body>
</html>
