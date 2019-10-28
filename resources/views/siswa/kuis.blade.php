@extends('layouts.app')

@section('content')
	<div class="main">
		@if(session('sukses'))
        	<div class="alert alert-success" role="alert">
              {{session('sukses')}}
            </div>
        @endif
		<div class="main-content">
			<div class="container-fluid">
		        <div class="row">
					<div class="col-md-12">

						<!-- BORDERED TABLE -->
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Kuis</h3>
							</div>
							<div class="panel-body" style="overflow-x:auto;">
								<table class="table table-hover">
									<thead class="text-center">
										<tr class="info">
											<th>No</th>
											<th>Nama Kuis</th>
											@if(auth()->user()->role == 'siswa' || auth()->user()->role == 'admin')
												<th>Ambil</th>
											@endif
										</tr>
									</thead>
									<tbody>									
										@foreach($mapel as $dat)
										<tr>
											<td>{{$no++}}</td>
											<td>{{$dat->nama}}</td>
											@if(auth()->user()->role == 'siswa' || auth()->user()->role == 'admin')
												<td>
													<a href="{{route('soal',$dat->id)}}" class="btn btn-primary btn-sm">Ambil Kuis</a>
												</td>
											@endif
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<!-- END BORDERED TABLE -->
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection