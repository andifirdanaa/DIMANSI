<!doctype html>
<html lang="en">

<head>
    <title>DIMANSI</title>
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
    <style>
         @font-face {
            font-family: "superfont";
            src: url("{{asset('font/superfont.ttf')}}") format('truetype');
        }
        h1{
            /* font-family: "superfont", "arial"; */
            color : black;
            font-weight : bold;
        }
        .iframe-container{
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            height: 0;
        }
        .iframe-container iframe{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

    @yield('css')
    @yield('header')
</head>

<body>
    
    <!-- WRAPPER -->
        <div class="container justify-content-center">
            <br><br>
            <div class="jumbotron">
                <a href="{{route('coba.konten')}}">
                    <button type="button" class="btn btn-primary btn-sm">Back</button>
                </a>
                <h1 class="display-4">HELLO, SOBAT DIMANSI</h1>
                <p class="lead">Pada kesempatan kali ini kami akan memberikan sample salah satu video pembelajaran yang ada di DIMANSI oleh karena itu mari sama - sama kita nikmati video di bawah ini</p>
                <p></p>
                <hr class="my-4">
                <div class="row justify-content-center align-items-center">
                    <div class="content">
                        <div class="col-md-12">
                                <h2>{{strtoupper($konten->title)}}</h2>
                                <div class="asker-meta">
                                    <span>{{ date('j F Y, h:ia', strtotime($konten->created_at))}}</span> <br>
                                    <span class="label label-default">{{$konten->category->name}}</span>
                                </div>
                        </div>
    
                        
                        <div class="col-md-12">
                            <br>
                            <div class="iframe-container">
                                {!! $konten->link_youtube !!}
                            </div>
                            <br>
                            <div class="post-content">
                                <p>{!! $konten->content !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="lead">
                    <a class="btn btn-primary btn-lg btn-block" href="https://docs.google.com/forms/d/e/1FAIpQLSfsixd0lF5_uKXH-FdZT4gFxshRGXRyFFrOP0ZXgAWMb5_umw/viewform?usp=sf_link" role="button">
                        DAFTAR SEKARANG!
                    </a>
                </p>
            </div>
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
