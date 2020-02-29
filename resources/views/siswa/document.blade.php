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
                                    <th>Terakhir Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($documents as $row)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$row->name_document}}</td>
                                        <td>
                                            <a href="{{route('download.siswa', $row->id)}}" ><i class="fa fa-download"></i> FILE</a>
                                        </td>
                                        <td> {{ $row->created_at->diffForHumans() }} </td>
                                        <!-- <td> {{ date('j F Y', strtotime($row->updated_at))}} </td> -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                         {{-- {!! $documents->render() !!} --}}

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   


@endsection

