<!DOCTYPE html>
@extends('layouts.app')

@section('css')
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){
            background-color: #f2f2f2
        }
    </style>
@endsection

@section('content')
<div class="main">
    
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Mata Pelajaran</h3>
                    @if(auth()->user()->role == 'admin')
                        <div class="right">
                            <button type="button" class="btn"  data-toggle="modal" data-target="#exampleModal">
                                Tambahkan Data Mapel
                            </button>
                        </div>
                    @endif
                </div>

                @if(session('info'))
                    <div class="alert alert-success" style="margin:10px;">
                        {{session('info')}}
                    </div>
                @endif
                
                <div class="panel-body" style="overflow-x:auto;">
                    <table class="table table-hover">
                        <thead class="text-center">
                            <tr class="info">
                                <th>No</th>
                                <th>Nama Mata Pelajaran</th>
                                <th>Terakhir Edit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mapel as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="#{{$item->id}}" data-toggle="modal"><i class="fa fa-edit"></i></a> |
                                        <a href="#{{$item->id}}-hapus" data-toggle="modal"><i class="fa fa-eraser"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>

                    @foreach ($mapel as $item)
                        <!-- CATEGORY DELETE -->
                            <div class="modal fade" id="{{$item->id}}-hapus">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                                            <h4 class="modal-title">Delete Mapel <b>"{{$item->nama}}"</b> ?</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('mapel.destroy', $item->id)}}" method="post" role="form">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}                 
                                                <div class="form-group">
                                                    <input type="submit" name="name" class="btn btn-danger btn-block" value="Hapus">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- END CATEGORY DELETE -->


                        <!-- CATEGORY EDIT -->
                            <div class="modal fade" tabindex="-1" id="{{$item->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                                            <h4 class="modal-title">Edit Mapel</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('mapel.update', $item->id)}}" method="post" role="form">
                                                {{csrf_field()}}
                                                {{method_field('put')}}                 
                                                <div class="form-group">
                                                    <label for="nama">Nama Mapel : </label>
                                                    <input type="text" name="nama" class="form-control" placeholder="Input Title .. " value="{{$item->nama}}">
                                                </div>
                                                <button class="btn btn-primary" type="submit">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- END CATEGOORY EDIT -->
                    @endforeach
                   {{-- {!! $data_siswa->render() !!} --}}
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
            <h5 class="modal-title" id="exampleModalLabel">Tambahkan Mapel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

        <form action="{{route('mapel.store')}}" method="POST" >
            {{csrf_field()}}
            <div class="form-group {{$errors->has('nama') ? 'has-error' : ' '}}">
                <label for="exampleInputNama">Nama Mapel</label>
                <input name="nama" type="text" class="form-control" id="exampleInputNama" aria-describedby="name" placeholder="Nama Mapel">
                @if($errors -> has('nama'))
                <span class="help-block">{{$errors->first('nama')}}</span>
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

@endsection

