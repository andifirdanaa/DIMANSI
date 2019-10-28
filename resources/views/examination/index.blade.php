@extends('layouts.app')


@section('content')
    <div class="main">
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Soal Latihan</h3>
                            <div class="right">
                                <a href="{{route('examination.create')}}" class="btn-primary btn-sm">Tambahkan Data Soal</a>
                            </div>
                        </div>
                            @if(session('info'))
                                <div class="alert alert-success" style="margin:10px">
                                    {{session('info')}}
                                </div>
                            @endif
                        <div class="panel-body" style="overflow-x:auto;">
                            <table class="table table-hover center">
                                <thead>
                                    <tr class="info">
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                        <th>Mapel</th>
                                        <th>Aktif</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Terakhir Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($latihans as $row)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{!! $row->soal !!}</td>
                                            <td>{{$row->mapel->nama}}</td>
                                            <td>
                                                {{$row->aktif}}
                                            </td>
                                            <td>
                                                <a href="{{route('examination.edit', $row->id)}}" data-toggle="modal"><i class="fa fa-edit" style="color:blue;"></i></a>
                                            </td>
                                            <td>
                                                <a href="#{{$row->id}}-hapus" data-toggle="modal"><i class="fa fa-trash" style="color:red;"></i></a>
                                            </td>
                                            <td> {{ $row->created_at->diffForHumans() }} </td>
                                            <!-- <td> {{ date('j F Y', strtotime($row->updated_at))}} </td> -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @foreach($latihans as $row)
                                <!-- CATEGORY DELETE -->
                                    <div class="modal fade" id="{{$row->id}}-hapus">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                                                    <h4 class="modal-title">Delete Soal <b> {!! $row->soal !!} </b> </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('examination.destroy', $row->id)}}" method="post" role="form">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection