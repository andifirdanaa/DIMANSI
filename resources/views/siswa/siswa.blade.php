<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<div class="main">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
              {{session('sukses')}}
            </div>
        @endif
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Siswa</h3>
                    @if(auth()->user()->role == 'admin')
                    <div class="right">
                        <button type="button" class="btn"  data-toggle="modal" data-target="#exampleModal">
                      Tambahkan Data Siswa
                    </button>
                        <button type="button" class="btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-cross"></i></button>
                    </div>
                    @endif
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_siswa as $siswa)
                                <tr>
                                   @if(auth()->user()->role == 'admin')
                                  <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_lengkap()}}</a></td>
                                  @endif
                                  @if(auth()->user()->role == 'guru')
                                  <td>{{$siswa->nama_lengkap()}}</td>
                                  @endif
                                  <td>{{$siswa->jenis_kelamin}}</td>
                                  <td>{{$siswa->alamat}}</td>
                                  @if(auth()->user()->role == 'admin')
                                    <td>
                                        <a href="/siswa/{{$siswa->id}}/edit" class ="btn btn-warning btn-sm">Edit</a>
                                        <a href="/siswa/{{$siswa->id}}/delete" class ="btn btn-danger btn-sm" onclick ="return confirm('Yakin data ini mau dihapus ?') " >Delete</a>
                                    </td>
                                  @endif
                                  @if(auth()->user()->role == 'guru')
                                    <td>
                                      <a href="/siswa/{{$siswa->id}}/profile" class ="btn btn-warning btn-sm">Input Nilai</a>
                                    </td>
                                  @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   {!! $data_siswa->render() !!}
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
   

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="/siswa/create" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
      <div class="form-group {{$errors->has('nama_depan') ? 'has-error' : ' '}}">
        <label for="exampleInputEmail1">Nama Depan</label>
        <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
        @if($errors -> has('nama_depan'))
          <span class="help-block">{{$errors->first('nama_depan')}}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Belakang</label>
        <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang">
      </div>
      <div class="form-group {{$errors->has('email') ? 'has-error' : ' '}}">
        <label for="exampleInputEmail1">Email</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
        @if($errors -> has('email'))
          <span class="help-block">{{$errors->first('email')}}</span>
        @endif
      </div>
       <div class="form-group {{$errors->has('tanggal_lahir') ? 'has-error' : ' '}}">
        <label for="tanggal_lahir">Tanggal lahir</label>
        <input name="tanggal_lahir" type="text" class="form-control" id="tanggal_lahir" aria-describedby="emailHelp" placeholder="Tanggal lahir">
        @if($errors -> has('tanggal_lahir'))
        <span class="help-block">{{$errors->first('tanggal_lahir')}}</span>
        @endif
      </div>
       <div class="form-group {{$errors->has('role') ? 'has-error' : ' '}}">
        <label for="exampleFormControlSelect1">Role</label>
        <select name="role" class="form-control" id="exampleFormControlSelect1">
          <option selected>Pilih Role</option>
            <option value="siswa">Siswa</option>
            <option value="murid">Murid</option>
        </select>
        @if($errors -> has('role'))
          <span class="help-block">{{$errors->first('role')}}</span>
        @endif
        </div>
      <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ' '}}">
        <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
        <option selected>Pilih Jenis Kelamin</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
        </select>
        @if($errors -> has('jenis_kelamin'))
          <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
        @endif
        </div>
        <div class="form-group {{$errors->has('nomer') ? 'has-error' : ' '}}">
        <label for="nomer">Nomer Handphone</label>
        <input name="nomer" type="text" class="form-control" id="nomer" aria-describedby="emailHelp" placeholder="Masukkan Nomer Handphone">
        @if($errors -> has('nomer'))
        <span class="help-block">{{$errors->first('nomer')}}</span>
        @endif
      </div>
        <div class="form-group {{$errors->has('alamat') ? 'has-error' : ' '}}">
            <label for="exampleFormControlTextarea1">Alamat</label>
            <textarea name="alamat"class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            @if($errors -> has('alamat'))
          <span class="help-block">{{$errors->first('alamat')}}</span>
        @endif
        </div>
        <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div>
</div>


</div>
@endsection

