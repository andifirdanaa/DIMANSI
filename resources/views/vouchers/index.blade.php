@extends('layouts.app')


@section('content')
    <div class="main">
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Voucher Dimansi</h3>
                            <div class="right">
                                <form action="{{route('voucher.store')}}" method="post" role="form">
                                    {{csrf_field()}}
                                    {{method_field('POST')}}                 
                                    <div class="form-group">
                                        <input type="submit" name="name" class="btn btn-info btn-block" value="Generate Voucher!">
                                    </div>
                                </form>
                            </div>
                        </div>
                            @if(session('info'))
                                <div class="alert alert-success" style="margin:10px">
                                    {{session('info')}}
                                </div>
                            @endif

                            @if(session('danger'))
                                <div class="alert alert-danger" style="margin:10px">
                                    {{session('danger')}}
                                </div>
                            @endif
                        <div class="panel-body" style="overflow-x:auto;">
                            <table class="table table-hover center" >
                                <thead>
                                    <tr class="info">
                                        <th>No</th>
                                        <th>Kode Voucher</th>
                                        <th>Start Date</th>
                                        <th>Expired Date</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($vouchers as $row)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->kode_voucher}}</td>
                                            <td>{{date('d-m-Y', strtotime($row->created_at))}}</td>
                                            <td>{{date('d-m-Y', strtotime($row->expired_until))}}</td>
                                            <td>
                                                <form action="{{route('voucher.destroy', $row->id)}}" method="post" role="form">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}                 
                                                    <div class="form-group">
                                                        <input type="submit" name="name" onclick="return confirm('Are you sure?')" class="btn btn-danger" value="Hapus">
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection