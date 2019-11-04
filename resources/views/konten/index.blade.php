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
                        <h3 class="panel-title">Data Kontens</h3>
                        <div class="right">
                            <a href="{{route('konten.create')}}" class="btn-primary btn-sm">Tambahkan Data Konten</a>
                        </div>
                    </div>
                    @if(session('sukses'))
                        <div class="alert alert-success" role="alert">
                            {{session('sukses')}}
                        </div>
                    @endif
                    <div class="panel-body" style="overflow-x:auto;">
                        <table class="table table-hover">
                            <thead>
                                <tr class="info">
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Terakhir Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kontens as $row)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$row->title}}</td>
                                        <td>
                                            <img src="{{asset('images/'.$row->image)}}" alt="no photo" width="100px">
                                        </td>
                                        <td>
                                            <a href="{{route('konten.edit', $row->id)}}" data-toggle="modal"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <a href="#{{$row->id}}-hapus" data-toggle="modal"><i class="fa fa-eraser"></i></a>
                                        </td>
                                        <td> {{ $row->created_at->diffForHumans() }} </td>
                                        <!-- <td> {{ date('j F Y', strtotime($row->updated_at))}} </td> -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                         {!! $kontens->render() !!}
                        @foreach($kontens as $row)
                            <!-- CATEGORY DELETE -->
                                <div class="modal fade" id="{{$row->id}}-hapus">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                                                <h4 class="modal-title">Delete Post <b>"{{$row->title}}"</b> ?</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('konten.destroy', $row->id)}}" method="post" role="form">
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

