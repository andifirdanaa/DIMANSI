@extends('layouts.app')


@section('content')
    <div class="main">
        <div class="main-content">
            @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                    {{session('sukses')}}
                </div>
            @endif

            <div class="row">
                <div class = "col-md-12">
                    <div class="panel">
                <div class="panel-heading">
                <h3 class="panel-title">SOAL SOAL KUIS</h3>
            </div>
            <div class="panel-body">
                <div class="col-lg-12">
                    @foreach ($soal as $item)
                        <form action="{{route('soal.jawab',$item->mapel_id)}}" method="post" >
                            {{csrf_field()}}
                            <input type="hidden" name="id[]" value="{{$item->id}}" >
                            <input type="hidden" name="jumlah" value="{{$jumlah}}" >
                            <input type="hidden" name="mapel_id" value="{{$mapel_id}}" >


                            <div class="form-group">
                                <label for="a">{!! $item->soal !!}</label>
                                <br>
                                <input name="pilihan[{{$item->id}}]" value="a" type="radio"> 
                                    @if ($item->status == 0)
                                        {{$item->a}} 
                                    @else 
                                        <img src="{{asset('KuisImage/'.$item->a)}}" alt="" width="100">
                                    @endif    
                                    <br><br>
                                <input name="pilihan[{{$item->id}}]" value="b" type="radio">
                                    @if ($item->status == 0)
                                        {{$item->b}} 
                                    @else 
                                        <img src="{{asset('KuisImage/'.$item->b)}}" alt="" width="100">
                                    @endif    
                                    <br><br>
                                <input name="pilihan[{{$item->id}}]" value="c" type="radio">
                                    @if ($item->status == 0)
                                        {{$item->c}} 
                                    @else 
                                        <img src="{{asset('KuisImage/'.$item->c)}}" alt="" width="100">
                                    @endif    
                                    <br><br>
                            </div>

                            <br>
                            @endforeach
                            <button class="btn btn-success" type="submit" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')">Save</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection

