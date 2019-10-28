<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DIMANSI</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">


  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/logo.png')}}">
  <link href="{{asset('css/dimansi.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">DIMANSI</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
           @if (Route::has('login'))
          @auth
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/home">Home</a>

            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#masuk">Masuk</a>

          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Tentang</a>
          </li>
           @else
           <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Tentang</a>
          </li>
           <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3" href="https://docs.google.com/forms/d/e/1FAIpQLSfsixd0lF5_uKXH-FdZT4gFxshRGXRyFFrOP0ZXgAWMb5_umw/viewform?usp=sf_link">Daftar</a>
          </li>
           <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#masuk">Masuk</a>
          </li>
           @endauth
           @endif
         
        </ul>
      </div>
    </div>
  </nav>
@if (Route::has('login'))
 @auth
  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5" src="img/logo.png" alt="">
      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">DIMANSI</h1>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0">Website Belajar Online Untuk Anak-anak</p>

    </div>
  </header>
 @else
  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center" style="height: auto;">
   <div class="container d-flex align-items-center flex-column"> 
      <div class="container">
        <div class="row">
        <div class="col-md-16 col-lg-6" style="text-align: center; padding-top: 70px;">
      <!-- Masthead Avatar Image -->
            <img class="head" src="img/logo.png" alt="">
          </div>

        <div class="col-md-16 col-lg-6" style="background-color: white; border-radius: 20px; height: auto;">
      <!-- Masthead Heading -->
      <h1 class="fontcolor" style="color: #000; text-align: center; padding-top: 20px;">DIMANSI</h1>
      <p class="masthead-subheading font-weight-light mb-lg-0" style="color: #000; text-align: center; padding-top:30px; font-family:'Source Sans Pro',sans-serif; ">Website Belajar Online Untuk Anak-anak</p>
      <p class="masthead-subheading font-weight-light mb-lg-0" style="color: #000; text-align: center; padding-top:30px; font-family:'Source Sans Pro',sans-serif; ">Dengan pembelajaran menarik melalui Game,Video,Kuis</p>
      <div class="row">
      <div class="col-md-4">
       <p class="masthead-subheading font-weight-light mb-lg-0" style="padding-top: 30px;"><img class="kecil" src="img/game.png" alt=""></p>
     </div>
     <div class="col-md-4">
       <p class="masthead-subheading font-weight-light mb-lg-0" style="padding-top: 30px;"><img class="kecil" src="img/Video.png" alt=""></p>
     </div>
      <div class="col-md-4">
       <p class="masthead-subheading font-weight-light mb-lg-0" style="padding-top: 30px;padding-bottom: 30px;"><img class="kecil" src="img/kuis.png" alt=""></p>
     </div>
   </div>
    </div>
    </div>
    </div>
    </div>
  </div>
  </header>

  <!-- Portfolio Section -->
  <section class="back page-section portfolio" id="masuk">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">MASUK</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Portfolio Grid Items -->
      <div class="row">

        <!-- Portfolio Item 1 -->
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <i>Murid</i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/anak.jpg" alt="">
          </div>
        </div>

        <!-- Portfolio Item 2 -->
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal2">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <i>Guru</i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/guru.jpg" alt="">
          </div>
        </div>

        <!-- Portfolio Item 3 -->
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal3">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <i>Orang Tua</i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/orangtua.jpg" alt="">
          </div>
        </div>

      <!-- /.row -->

    </div>
  </section>
@endauth
@endif
  <!-- About Section -->
  <section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">

      <!-- About Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-white">Tentang</h2>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- About Section Content -->
      <div class="row">
        <div class="col-lg-4 ml-auto">
          <p class="lead">DIMANSI merupakan singkatan dari Dunia Imajinasi Anak Masa Kini, kami adalah website pembelajaran bagi anak - anak agar dapat mengembangkan pengetahuan berfikir dan imajinasi anak.</div>
        <div class="col-lg-4 mr-auto">
          <p class="lead">Dengan metode pembelajaran yang menarik dan menyenangkan bagi anak. Dimansi hadir untuk terus mengembangkan potensi dalam diri anak, agar bisa diaplikasikan di lingkungan, terutama keluarga. </p>
        </div>
      </div>

       <!-- About Section Button -->
      <div class="text-center mt-4">
        <a class="btn btn-xl btn-outline-light" href="{{route('coba.konten')}}">
          <i class="fas fa-video mr-2"></i>
          Ayo Coba Lihat!
        </a>
      </div>


    </div>
  </section>

  <!-- Contact Section -->
  

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.50331238867!2d106.84714451419335!3d-6.197129462435398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec24e3f773c3%3A0x483a1180bc6cf18f!2sUniversitas+Persada+Indonesia+Y.A.I!5e0!3m2!1sid!2sid!4v1565624026788!5m2!1sid!2sid" width="300" height="250" frameborder="0" style="box-shadow: 0px 5px 20px black; border-radius:20px;" allowfullscreen></iframe>
        </div>

        <!-- Footer Social Icons -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Around the Web</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/dimansi_id/" target="_blank">
            <i class="fab fa-fw fa-instagram"></i>
          </a>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">About Founder</h4>
            <a href="">
             <img class="img-fluid" src="img/1.png" alt="">
            </a>

            <a href="">
                <img class="img-fluid" src="img/2.png" alt="">
            </a>

            <a href="">
               <img class="img-fluid" src="img/3.png" alt="">
            </a>
        </div>
      </div>
      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; DIMANSI 2019</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Portfolio Modals -->

  <!-- Portfolio Modal 1 -->
  <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
               <form class="form-auth-small" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input name="email" type="email" class="form-control" id="signin-email" placeholder="Email">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input name ="password" type="password" class="form-control" id="signin-password" placeholder="Password">
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span>Remember me</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <div class="bottom">
                                    <span class="helper-text"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Forgot password?</a></span>
                                </div>
                            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 2 -->
  <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
               <form class="form-auth-small" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input name="email" type="email" class="form-control" id="signin-email" placeholder="Email">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input name ="password" type="password" class="form-control" id="signin-password" placeholder="Password">
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span>Remember me</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <div class="bottom">
                                    <span class="helper-text"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Forgot password?</a></span>
                                </div>
                            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 3 -->
  <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-labelledby="portfolioModal3Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
               <form class="form-auth-small" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input name="email" type="email" class="form-control" id="signin-email" placeholder="Email">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input name ="password" type="password" class="form-control" id="signin-password" placeholder="Password">
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span>Remember me</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <div class="bottom">
                                    <span class="helper-text"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Forgot password?</a></span>
                                </div>
                            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>

</body>
</html>