@extends('layouts.admin')
@section('content')
	<div class="page-body">
		<div class="card">
			<h3 class="mt-5 ml-5 main-title">{{Auth::user()->nama}}'s Profile</h3>
				{{-- Form To edit Information --}}
				<div id="formEdit" style="display: none" class="collapse my-4">
					<div class="">
						<div id="bio-container" class="p-5"
							style="width: 100% !important;">
							<form method="post"action="{{route('updateBio', Auth::user()->id_pengguna)}}"
								enctype="multipart/form-data">
								@csrf
								@method('PUT')
								<div class="form-group">
									<label for="nama" class="col-form-label">Nama</label>
									<div class="">
										<input type="text" class="form-control" id="nama" value="{{Auth::user()->nama}}" name="nama">
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-form-label">Email</label>
									<div class="">
										<input type="email" class="form-control" id="email" value="{{Auth::user()->email}}" name="email">
									</div>
								</div>
								<div class="form-group">
									<label for="no_telp" class="col-form-label">Telepon</label>
									<div class="">
										<input type="text" class="form-control" id="no_telp" value="{{Auth::user()->no_telp}}" name="no_telp">
									</div>
								</div>
								<div class="form-group">
									<label for="username" class="col-form-label">Username</label>
									<div class="">
										<input type="text" class="form-control" id="username" value="{{Auth::user()->username}}" name="username">
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-form-label">Password</label>
									<div class="">
										<input type="password" class="form-control" id="password" placeholder="New Password" name="password">
									</div>
								</div>
								<div class="form-group">
									<label for="foto_profil" class="col-form-label">Foto</label>
									<div class="">
										<input type="file" class="form-control" id="foto_profil" name="foto_profil">
									</div>
								</div>
								<a href="#" class="btn btn-sm btn-primary btn-outline-primary mt-3"
									onclick="$('#formEdit').hide(); $('#info-bio').show(); return false;">Cancel</a>
								<button class="btn btn-sm btn-primary  mt-3">Submit</button>
							</form>
						</div>
					</div>
				</div>
	
	
				{{-- Biodata Informastion --}}
				<div id="info-bio">
					<div class="d-flex">
						<div class=" imageContainer py-5" style="width: 45% !important; justify-content: center;">
							<div style="display: flex; justify-content: center">
								<img src="{{asset('storage/'.Auth::user()->foto_profil) }}" width="280px" height="280px" alt=""
									style="border-radius: 50%">
							</div>
						</div>
						<div id="bio-container" class="p-5"
							style="border-left: 1.5px solid rgb(216, 214, 214); width: 55% !important;">
							<h5 class="title-profile">Name:</h5>
							<p class="content-profile">{{Auth::user()->nama}}</p>
							<hr>
							<h5 class="title-profile">Email:</h5>
							<p class="content-profile">{{Auth::user()->email}}</p>
							<hr>
							<h5 class="title-profile">Telepon:</h5>
							<p class="content-profile">{{Auth::user()->no_telp}}</p>
							<hr>
							<h5 class="title-profile">Email:</h5>
							<p class="content-profile">{{Auth::user()->username}}</p>
							<hr>
							<div>
								<button class="btn btn-sm btn-primary"
									onclick="$('#formEdit').show(); $('#info-bio').hide(); return false;">Edit
									Profile & Change Password</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection