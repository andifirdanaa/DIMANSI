<!DOCTYPE html>
@extends('layouts.app')
@section('css')
  <style media="screen">
    @font-face {
      font-family: "superfont";
      src: url("{{asset('font/superfont.ttf')}}") format('truetype');
    }

    h3{
      text-align: center;
      font-family: "superfont", "calibri";
      font-size: 25px;

    }

    .linkJudul{
      color: black;
      font-weight: 800px;

    }

    a:hover{
      color: purple;
      text-decoration: none;
    }
    
    .card{
      max-height: auto;
      min-height: 100px;
      margin-bottom : 20px;
      padding : 20px;
    }


    img:hover{
      transform: scale(1.1);
    }
  </style>
@endsection

@section('content')
  @if(auth()->user()->role == 'siswa'  || auth()->user()->role == 'admin' || auth()->user()->role == 'guru')
    <div class="main">
      <div class="main-content">
        <div class="row">
          @if(auth()->user()->role == 'siswa')
            <div class="col-md-3">
              <div class="metric2">
                <span class="icon"><i class="lnr lnr-graduation-hat"></i></span>
                <a href="/kuis">
                  <p>
                    <span class="number" >Kuis</span>
                    <span class="title"><br></span>
                  </p>
                </a>
              </div>
            </div>
            <div class="col-md-3" >
              <div class="metric">
                <span class="icon" ><i class="fa fa-puzzle-piece"></i></span>
                <a href="{{route('siswa.game')}}">
                  <p>
                    <span class="number"  >Games</span>
                    <span class="title"><br></span>
                  </p>
                </a>
              </div>
            </div>
            <div class="col-md-3" >
              <div class="metric">
                <span class="icon" ><i class="fa fa-download"></i></span>
                <a href="{{route('document.list')}}">
                  <p>
                    <span class="number"  >Download File Area</span>
                    <span class="title"><br></span>
                  </p>
                </a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="metric3">
                <span class="icon"><i class="lnr lnr-film-play"></i></span>
                <a href="/video"><p>
                  <span class="number" font-color="red">Video</span>
                  <span class="title"><br></span>
                </p>
              </a>
            </div>
          @endif
        </div>
        @if(auth()->user()->role == 'admin')
          <div class="col-md-3">
            <div class="metric">
              <span class="icon"><i class="fa fa-eye"></i></span>
              <p>
                <span class="number">{{$siswa->count()}}</span>
                <span class="title">Jumlah Siswa</span>
              </p>
            </div>
          </div>    
        @endif
        @if(auth()->user()->role == 'guru')
          <div class="col-md-3">
            <div class="metric">
              <span class="icon"><i class="fa fa-eye"></i></span>
              <p>
                <span class="number">{{$siswa->count()}}</span>
                <span class="title">Jumlah Siswa</span>
              </p>
            </div>
          </div>
        @endif
        <div class="col-md-12">
          <div class="row my-4 justify-content-center">
            @foreach($kontens as $post)
              <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 d-flex">
                <div class="card">
                  <a href="{{route('konten.show' , $post->slug)}}">
                      <img class="img-thumbnail" id="news-images" src="{{asset('images/'.$post->image)}}" alt="sampul berita" style="border:none;">
                  </a>
                  <div class="judul">
                    <br>
                    <a href="{{route('konten.show' , $post->slug)}}" class="linkJudul" >
                        <b>
                          {{strtoupper(str_limit($post->title,40))}}
                        </b>  
                    </a>
                  </div>
                  <div>
                    <br>
                    <span><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <div class="paginate text-center">
            {{ $kontens->links() }}
          </div>
        </div>
      </div>
    </div>
  @endif
  @if(auth()->user()->role == 'murid')
    <div class="main">
      <div class="main-content">
        <div class="row">
            <div class="col-md-3">
              <div class="metric3">
                <span class="icon"><i class="lnr lnr-film-play"></i></span>
                <a href="/video">
                  <p>
                    <span class="number" font-color="red">Video</span>
                    <span class="title"><br></span>
                  </p>
                </a>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="jumbotron">
        <h1 class="display-4">HELLO, SOBAT DIMANSI</h1>
        <p class="lead">Selamat datang, selamat belajar. Untuk mulai pelajaran klik link video di atas ya.</p>
        <p>Belajar dapat membuatmu semakin dekat dengan cita-citamu, semangat belajar adik-adik.</p>
        <hr class="my-4">
        <div class="row justify-content-center align-items-center">
    </div>
  @endif
@endsection

