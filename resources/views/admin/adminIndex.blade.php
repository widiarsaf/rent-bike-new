@extends('layouts.admin')
@section('content')
<div>
    @if ($message = Session::get('fail'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Failed!!</strong><span> {{ $message }}</span>
    </div>
    @elseif ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!!</strong><span> {{ $message }}</span>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<div class="page-body">
    <div class="card">
        <div class="card-header">
            <h5>Tabel Daftar Admin</h5>
            <span>Daftar Adin Yang Terdaftar</span>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><i class="icofont icofont-simple-left "></i></li>
                    <li><i class="icofont icofont-maximize full-card"></i></li>
                    <li><i class="icofont icofont-minus minimize-card"></i></li>
                    <li><i class="icofont icofont-refresh reload-card"></i></li>
                    <li><i class="icofont icofont-error close-card"></i></li>
                </ul>
            </div>
        </div>
        <div class="card-block table-border-style">
            <div id="header-content">
                <div class="header">
                    <div class="d-flex mb-4" style="justify-content :space-between">
                        <button class="btn btn-primary ml-3" onclick="showFormaAddAdmin(); return false;">
                            <i class="ti-plus"></i>
                            Tambah Data
                        </button>
                    </div>
                </div>
            </div>
            {{-- Form Add Data --}}
            <div class="mx-3 mb-3" style="display:none;" id="formAddAdmin">
                <h4 class=" mb-3">Masukkan Data Admin Baru</h4>
                <form method="post" action="{{ route('daftarAdmin.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="text" class="form-control" id="no_telp" placeholder="Masukkan no_telp"
                            name="no_telp">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Masukkan username"
                            name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan password"
                            name="password">
                    </div>
                    <div class="form-group">
                        <label for="foto_profil">Foto Profile</label>
                        <input type="file" class="form-control" id="foto_profil" placeholder="Masukkan foto_profil"
                            name="foto_profil">
                    </div>
                    <a type="button" id="close" class="btn btn-primary btn-outline-primary"
                        onclick="hideForm()">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            {{-- Tabel --}}
            <div class=" table-responsive" style="display: block;" id="adminTable">
                <table class="table table-hover" id="tabelAdmin">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Password</th>
                            <th>Photo Profile</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($admin as $admin)<tr>
                            <td>{{$no++}}</td>
                            <td>{{$admin->nama}}</td>
                            <td>{{$admin->username}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->no_telp}}</td>
                            <td>
                                <p class="long-text">{{$password}}</p>
                            </td>
                            <td><img width=" 80px" src="{{asset('storage/'.$admin->foto_profil) }}">
                            </td>
                            <td style="display: flex">
                                <a type="button" class="btn btn-warning"
                                    href="{{ route('daftarAdmin.edit', $admin->id_pengguna) }}"><i
                                        class="ti-marker-alt"></i></a>
                                <form style="margin-left: 5px"
                                    action="{{ route('daftarAdmin.destroy', $admin->id_pengguna) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="ti-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Basic table card end -->
</div>
<script>
    function showFormaAddAdmin(){
        console.log('OK')
        var formAdd = document.getElementById('formAddAdmin');
        var adminTable = document.getElementById('adminTable');
        var header = document.getElementById('header-content');
        if (formAdd.style.display === "none") {
            formAdd.style.display = "";
            adminTable.style.display = "none";
            header.style.display ="none";
        } else {
            formAdd.style.display = "none";
            adminTable.style.display = "";
            header.style.display ="block";
        }
    }

    function hideForm()
    {
        console.log('OK')
        var formAdd = document.getElementById('formAddAdmin');
        var adminTable = document.getElementById('adminTable');
        var header = document.getElementById('header-content');
        if (formAdd.style.display === "") {
            formAdd.style.display = "none";
            adminTable.style.display = "";
            header.style.display= "";
        }
    }

</script>




@endsection