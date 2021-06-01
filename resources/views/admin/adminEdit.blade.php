@extends('layouts.admin')
@section('content')
<div class="page-body">
    <div class="card">
        <div class="collapse mx-3 mb-3" style="display:block" id="formEditPengguna">
            <h4 class=" mb-3">Edit Data Admin</h4>
            <form method="post" action="{{ route('daftarAdmin.update', $admin->id_pengguna)}}" id="myForm"
                enctype="multipart/form-data">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama" name="nama"
                        value="{{$admin->nama}}">
                </div>
                <div class=" form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Masukkan email" name="email"
                        value="{{$admin->email}}">
                </div>
                <div class=" form-group">
                    <label for="no_telp">No Telp</label>
                    <input type="text" class="form-control" id="no_telp" placeholder="Masukkan no_telp" name="no_telp"
                        value="{{$admin->no_telp}}">
                </div>
                <div class=" form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Masukkan username"
                        name="username" value="{{$admin->username}}">
                </div>
                <div class=" form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukkan password"
                        name="password" value="{{$admin->password}}">
                </div>
                <div class="form-group">
                    <label for="foto_profil">Foto Profile</label>
                    <input type="file" class="form-control" id="foto_profil" placeholder="Masukkan foto_profil"
                        name="foto_profil">
                    <img src="{{asset('storage/'.$admin->foto_profil) }}" alt="">
                </div>
                <a type="button" class="btn btn-primary btn-outline-primary"
                    href="{{route('daftarAdmin.index')}}">back</a>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</div>

@endsection