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
                    <h3 class="panel-title">Nilai Kuis</h3>
                    
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
                                <th>Nama Siswa</th>
                                <th>Mapel</th>
                                <th>Benar</th>
                                <th>Salah</th>
                                <th>Kosong</th>
                                <th>Score</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilai as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->mapel->nama}}</td>
                                    <td>{{$item->benar}}</td>
                                    <td>{{$item->salah}}</td>
                                    <td>{{$item->kosong}}</td>
                                    <td>{{$item->score}}</td>
                                    <td>
                                        <a href="#{{$item->id}}-hapus" data-toggle="modal"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>

                    @foreach ($nilai as $item)
                        <!-- CATEGORY DELETE -->
                            <div class="modal fade" id="{{$item->id}}-hapus">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                                            <h4 class="modal-title">Delete Nilai <b>"{{$item->user->name}}"</b> ?</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('nilai.destroy', $item->id)}}" method="post" role="form">
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
                    @endforeach
                   {{-- {!! $data_siswa->render() !!} --}}
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection

