@extends('layouts.customer')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Trendy and Cool</p>
					<h1>Sepeda</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->
<center>
	<h1 style="margin-top: 90px">My Profile</h1>
</center>


<div class="card mt-100 mb-100" style="background: #051922">
	<div id="formEdit" style="display: none" class="collapse my-4">
		<div class="abt-section mt-100 mb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-12 mt-5">
						<div class="">
							<img src="{{asset('storage/'.Auth::user()->foto_profil) }}" width="80%" alt="" style="border-radius: 50%">
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
					<form method="post" action="{{route('updateBio', Auth::user()->id_pengguna)}}" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="nama" class="col-form-label label-profile">Nama</label>
							<div class="">
								<input type="text" class="form-control input-profil" id="nama" value="{{Auth::user()->nama}}" name="nama">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-form-label label-profile">Email</label>
							<div class="">
								<input type="email" class="form-control input-profil" id="email" value="{{Auth::user()->email}}" name="email">
							</div>
						</div>
						<div class="form-group">
							<label for="no_telp" class="col-form-label label-profile">Telepon</label>
							<div class="">
								<input type="text" class="form-control input-profil" id="no_telp" value="{{Auth::user()->no_telp}}"
									name="no_telp">
							</div>
						</div>
						<div class="form-group">
							<label for="username" class="col-form-label label-profile">Username</label>
							<div class="">
								<input type="text" class="form-control input-profil" id="username" value="{{Auth::user()->username}}"
									name="username">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-form-label label-profile">Password</label>
							<div class="">
								<input type="password" class="form-control input-profil" id="password" placeholder="New Password" name="password">
							</div>
						</div>
						<div class="form-group">
							<label for="foto_profil" class="col-form-label label-profile">Foto</label>
							<div class="">
								<input type="file" class="form-control input-profil" id="foto_profil" name="foto_profil">
							</div>
						</div>
						<a href="#" class="boxed-btn mt-4 cancel" style="color: white; border: 1px solid yellow; background:none"
							onclick="$('#formEdit').hide(); $('#info-bio').show(); return false;">Cancel</a>
						<button class="boxed-btn mt-4">Submit</button>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="info-bio">
		<div class="abt-section mt-100 mb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<div class="">
							<img src="{{asset('storage/'.Auth::user()->foto_profil) }}" width = "80%" alt="" style="border-radius: 50%">
						</div>
					</div>
					<div class="col-lg-6 col-md-12" >
						<div class="abt-text">
							<h5 class="title-profile" style = "color: #eaee83">Name:</h5>
							<p class="content-profile" style="color: white">{{Auth::user()->nama}}</p>
							<hr style = "background: rgb(77, 77, 77)">
							<h5 class="title-profile" style = "color: #eaee83">Email:</h5>
							<p class="content-profile" style="color: white">{{Auth::user()->email}}</p>
							<hr style = "background: rgb(77, 77, 77)">
							<h5 class="title-profile" style = "color: #eaee83">Telepon:</h5>
							<p class="content-profile" style="color: white">{{Auth::user()->no_telp}}</p>
							<hr style = "background: rgb(77, 77, 77)">
							<h5 class="title-profile" style = "color: #eaee83">Username:</h5>
							<p class="content-profile" style="color: white">{{Auth::user()->username}}</p>
							<hr style = "background: rgb(77, 77, 77)">
							<button class="boxed-btn mt-4" onclick="$('#formEdit').show(); $('#info-bio').hide(); return false;">Edit
								Profile & Change Password</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection