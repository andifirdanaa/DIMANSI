<!doctype html>
<html lang="en">

<head>
    <title>Dimansi</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/logo.png')}}">
    @yield('css')
    @yield('header')
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="/home"><img src="{{asset('assets/img/baru.png')}}" alt="Klorofil Logo" class="img-responsive logo"></a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        
                        <li class="dropdown">
                            @if(auth()->user()->role == 'siswa')
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{auth()->user()->siswa->getAvatar()}}" class="img-circle" alt="Avatar"><span>{{strtoupper(auth()->user()->name)}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            @endif
                            @if(auth()->user()->role == 'guru')
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{auth()->user()->guru->getAvatar()}} " class="img-circle" alt="Avatar"><span>{{strtoupper(auth()->user()->name)}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            @endif
                            @if(auth()->user()->role == 'admin')
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{auth()->user()->siswa->getAvatar()}}" class="img-circle" alt="Avatar"><span>{{strtoupper(auth()->user()->name)}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            @endif
                            <ul class="dropdown-menu">
                                @if(auth()->user()->role == 'admin')
                                <li><a href="/profilesiswa"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                @endif
                                @if(auth()->user()->role == 'guru')
                                <li><a href="/myprofile"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                @endif
                                @if(auth()->user()->role == 'siswa')
                                <li><a href="/profilesiswa"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                @endif
                                <li><a href="{{Route('change')}}"><i class="lnr lnr-user"></i> <span>Setting</span></a></li>
                                <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="/home" ><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>

                        @if(auth()->user()->role == 'admin')
                            <li><a href="/siswa" class=""><i class="lnr lnr-user"></i> <span>Data Siswa</span></a></li>
                            <li><a href="/guru" class=""><i class="lnr lnr-user"></i> <span>Data Guru</span></a></li>
                           <!--  <li><a href="#" class=""><i class="fa fa-database"></i> <span>Nilai Siswa</span></a></li> -->
                            <li>
                                <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-database"></i> <span>Data Konten</span>     <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                <div id="subPages" class="collapse ">
                                    <ul class="nav">
                                        <li><a href="{{route('category.index')}}" class=""><i class="fa fa-th-list"></i> <span>Data Kategori</span></a></li>
                                        <li><a href="{{route('konten.index')}}" class=""><i class="fa fa-film"></i> <span>Konten</span></a></li>
                                        <li><a href="{{route('konten.index')}}" class=""><i class="fa fa-film"></i> <span>Latihan</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="#" class=""><i class="fa fa-calendar"></i> <span>Latihan Soal</span></a></li>
                           <!--  <li>
                                <a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="fa fa-calendar"></i> <span>Jadwal</span>     <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                <div id="subPages1" class="collapse ">
                                    <ul class="nav">
                                        <li><a href="/jadwal/ujian" class="">Jadwal Ujian</a></li>
                                        <li><a href="/jadwal/pelajaran" class="">Jadwal Pelajaran</a></li>
                                    </ul>
                                </div>
                            </li> -->
                        @endif
                        @if(auth()->user()->role == 'guru')
                         <li><a href="/siswa" class=""><i class="lnr lnr-user"></i> <span>Data Siswa</span></a></li>
                        @endif
                        @if(auth()->user()->role == 'siswa')
                        <li><a href="/siswa/{id}/nilaisiswa" class=""><i class="fa fa-database"></i> <span>Nilai Siswa</span></a></li>
                        <li><a href="#" class=""><i class="fa fa-calendar"></i> <span>Latihan Soal</span></a></li>
                        @endif
                        
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        @yield('content')
        <!-- END MAIN -->
        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                <p class="copyright">&copy; 2019 <b>Dimansi Team</b> All Rights Reserved.</p>
            </div>
        </footer>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/scripts/klorofil-common.js')}}"></script>
    <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('js')
    @yield('footer')        

</body>

</html>
