@extends('layouts.app')
@section('css')
    <style>
        .card{
            color :black;
            margin: 30px;
        }
        .head, tbody{
            text-align: center;
        }
    </style>
@endsection

@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
		        <div class="row">
					<div class="col-md-12">

						<!-- BORDERED TABLE -->
						<div class="panel">
							<div class="panel-heading">
                                <br>
                                <div class="right">
                                    <a href="{{route('kuis.index')}}" class="btn-primary btn-sm">Back</a>
                                </div>
							</div>
                            <div class="panel-body" style="overflow-x:auto;">
                                    <div class="card border-primary mb-3">
                                        <h2>Hello!</h2>
                                    <h3>Kamu Telah Selesai Mengerjakan Tes Ini <u>{{Auth::user()->name}}</u>!</h3>
                                        <hr>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="2" class="head">
                                                        <h4><b>LAPORAN HASIL NILAI</b></h4>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Mata Pelajaran</th>
                                                    <td>{{$nilai->first()->mapel->nama}}</td>
                                                </tr>
                                                <tr style="background-color : #6db4f2;">
                                                    <th scope="row">Jawaban Benar</th>
                                                    <td>{{$nilai->first()->benar}}</td>
                                                </tr>
                                                <tr style="background-color : #f77474;">
                                                    <th scope="row">Jawaban Salah</th>
                                                    <td>{{$nilai->first()->salah}}</td>
                                                </tr>
                                                <tr style="background-color : #f5ff85;">
                                                    <th scope="row">Jawaban Kosong</th>
                                                    <td>{{$nilai->first()->kosong}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Jumlah Soal</th>
                                                    <td>{{$jumlah}}</<td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" colspan="2">
                                                        <h3>Nilai Anda</h3>
                                                        <h3> {{$nilai->first()->score}}</h3>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
							</div>
						</div>
						<!-- END BORDERED TABLE -->
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection