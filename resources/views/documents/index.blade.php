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
                        <h3 class="panel-title">Data Unduhan</h3>
                        <div class="right">
                            
                            <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn-primary btn-sm">Tambahkan Data Konten</a>
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
                                    <th>Download</th>
                                    <th>Delete</th>
                                    <th>Terakhir Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($documents as $row)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$row->name_document}}</td>
                                        <td>
                                            <a href="{{route('document.download', $row->id)}}" ><i class="fa fa-download"></i> FILE</a>
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
                         {{-- {!! $documents->render() !!} --}}

                        @foreach($documents as $row)
                            <!-- CATEGORY DELETE -->
                                <div class="modal fade" id="{{$row->id}}-hapus">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                                                <h4 class="modal-title">Delete File <b>"{{$row->name_document}}"</b> ?</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('document.destroy', $row->id)}}" method="post" role="form">
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data Dokumen Unduhan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
        <div class="form-group {{$errors->has('title') ? 'has-error' : ' '}}">
          <label for="exampleInputEmail1">Title</label>
          <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title Unduhan">
          @if($errors -> has('title'))
            <span class="help-block">{{$errors->first('title')}}</span>
          @endif
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Upload</</label>
          <input name="upload_document" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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

