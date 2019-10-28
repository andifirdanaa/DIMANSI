@extends('layouts.app')

@section('content')
<div class="main">

			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
<div class="panel panel-profile">
	<div class="clearfix">
		<!-- LEFT COLUMN -->
		<div class="profile-left">

			<!-- PROFILE HEADER -->
			<div class="profile-header">
				<div class="overlay"></div>
				<div class="profile-main">
					<img src="{{auth()->user()->siswa->getAvatar()}}" width="90px" height="90px" class="img-circle" alt="">
					<h3 class="name"><b>{{strtoupper(auth()->user()->siswa->nama_lengkap())}}</b></h3>
					<span><b>{{auth()->user()->email}}</b></span>
				</div>
				{{-- <div class="profile-stat">
					<div class="row">
						<div class="col-md-6 stat-item">
							{{auth()->user()->siswa->mapel->count()}}<span>Mata Pelajaran</span>
						</div>
						<div class="col-md-6 stat-item">
							{{auth()->user()->siswa->mapel->count()}}<span>Kelas</span>
						</div>
					</div>
				</div> --}}
			</div>
			<!-- END PROFILE HEADER -->

			<!-- PROFILE DETAIL -->
			<div class="profile-detail">
				<div class="profile-info">
					<h4 class="heading">Data Diri</h4>
					<ul class="list-unstyled list-justify">
						<li>Jenis Kelamin<span>{{auth()->user()->siswa->jenis_kelamin}}</span></li>
						<li>No Handphone<span>{{auth()->user()->siswa->nomer}}</span></li>
						<li>Alamat<span>{{auth()->user()->siswa->alamat}}</span></li>
						<li>Tanggal Lahir <span>{{auth()->user()->siswa->tanggal_lahir}}</span></li>
					</ul>
				</div>
				<div class="text-center"><a href="/editsiswa/{{auth()->user()->siswa->id}}" class="btn btn-warning">Edit Profile</a></div>
			</div>
			<!-- END PROFILE DETAIL -->
		</div>
		<!-- END LEFT COLUMN -->

		<!-- RIGHT COLUMN -->
		<div class="profile-right">
			<h4 class="heading"></h4>

			<!-- AWARDS -->
			
			<!-- END AWARDS -->

			<!-- TABBED CONTENT -->
			<div class="custom-tabs-line tabs-line-bottom left-aligned">
				<ul class="nav" role="tablist">
					<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Nilai Siswa</a></li>
				</ul>
			</div>
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Nilai</h3>
				</div>
				<div class="panel-body">
					{{-- <table class="table table-striped">
						<thead>
							<tr>
								<th>Kode</th>
								<th>Nama Pelajaran</th>
								<th>Nilai</th>
						</thead>
						<tbody>
							@foreach(auth()->user()->siswa->mapel as $mapel)
							<tr>
								<td>{{$mapel->kode}}</td>
								<td>{{$mapel->nama}}</td>
								<td>{{$mapel->pivot->nilai}}</td>
							</tr>
							@endforeach
							
						</tbody>
					</table> --}}
				</div>
			</div>
			<!-- END TABBED CONTENT -->
		</div>
		<!-- END RIGHT COLUMN -->
	</div>
</div>

				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
@endsection