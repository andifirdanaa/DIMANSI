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
					<img src="{{auth()->user()->guru->getAvatar()}}" width="90px" height="90px" class="img-circle" alt="Avatar">
					<h3 class="name">{{strtoupper(auth()->user()->guru->nama_lengkap())}}</h3>
					<span class=" ">{{auth()->user()->email}}</span>
				</div>
				<div class="profile-stat">
					<div class="row">
						<div class="col-md-4 stat-item">
							<span><br><br></span>
						</div>
						<div class="col-md-4 stat-item">
							 <span><br></span>
						</div>
						<div class="col-md-4 stat-item">
							<span><br></span>
						</div>
					</div>
				</div>
			</div>
			<!-- END PROFILE HEADER -->

			<!-- PROFILE DETAIL -->
			<div class="profile-detail">
				<div class="profile-info">
					<h4 class="heading">Data Diri</h4>
					<ul class="list-unstyled list-justify">
						<li>Jenis Kelamin<span>{{auth()->user()->guru->jenis_kelamin}}</span></li>
						<li>No Handphone<span>{{auth()->user()->guru->nomer}}</span></li>
						<li>Alamat<span>{{auth()->user()->guru->alamat}}</span></li>
						<li>Tanggal Lahir <span>{{auth()->user()->guru->tanggal_lahir}}</span></li>
					</ul>
				</div>
				<div class="text-center"><a href="/guru/{{auth()->user()->guru->id}}" class="btn btn-warning">Edit Profile</a></div>
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
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Nama Siswa</th>
								<th>Nama Pelajaran</th>
								<th>Total Nilai</th>
						</thead>
						<tbody>
							@foreach($nilai as $item)
							<tr>
								<td>{{$item->siswa->nama_lengkap()}}</td>
								<td>{{$item->mapel->nama}}</td>
								<td>{{$item->score}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
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