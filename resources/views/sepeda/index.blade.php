@extends('layouts.admin')
@section('content')
<div class="page-body">
    <div class="card">
        <div class="card-header">
            <h5>Tabel Paket Penyewaan</h5>
            <span>Daftar Paket Penyewaan Yang disediakan</span>
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
            <div class="d-flex mx-3 mb-3" style="justify-content :space-between">
                <div class="pcoded-search" id="search" style="width: 500px !important;">
                    <span class="searchbar-toggle"></span>
                    <form action="">
                        <div class="pcoded-search-box d-flex">
                            <input type="text" class="mr-3" placeholder="Search">
                            <span>
                                <button class="btn btn-info"><i class="ti-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
                <button class="btn btn-primary ml-3" onclick="showFormAddSepeda(); return false;">
                    <i class="ti-plus"></i>
                    Tambah Data
                </button>

            </div>
            {{-- Form Add Data --}}
            <div class="mx-3 mb-3" style="display:none;" id="formAddSepeda">
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
                <h4 class=" mb-3">Masukkan Data Sepeda Baru</h4>
                <form method="post" action="{{ route('sepeda.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="unit_code">Unit Code</label>
                        <input type="text" class="form-control" id="unit_code" placeholder="Masukkan code unit"
                            name="unit_code">
                    </div>
                    <div class="form-group">
                        <label for="Kategori">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="form-control">
                            @foreach($kategori as $ktg)
                            <option value="{{$ktg->id_kategori}}">{{$ktg->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea type="text" class="form-control" id="deskripsi" placeholder="Masukkan deskripsi"
                            name="deskripsi"> </textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto_unit">Foto Unit</label>
                        <input type="file" class="form-control" id="foto_unit" name="foto_unit">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="dipinjam">dipinjam</option>
                            <option value="tersedia">tersedia</option>
                        </select>

                    </div>
                    <button type="submit" class="btn btn-primary" onclick="$('#formAdd').hide();">Submit</button>
                </form>
            </div>

            {{-- Edit Data --}}
            <div class="collapse mx-3 mb-3" id="formEditSepeda">
                <h4 class=" mb-3">Edit Sepeda Baru</h4>
                <form method="post" action="{{ route('sepeda.update', 'test')}}" id="myForm"
                    enctype="multipart/form-data">
                    {{method_field('PUT')}}
                    {{csrf_field()}}
                    <input type="hidden" name="id_sepeda" id="idSepeda" value="">
                    <div class="form-group">
                        <label for="unit_code">Unit Code</label>
                        <input type="text" class="form-control" id="unitCode" value=" " placeholder="Masukkan code unit"
                            name="unit_code">
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select name="kategori_id" id="kategoriId" class="form-control">
                            @foreach($kategori as $ktg)
                            <option value="{{$ktg->id_kategori}}">{{$ktg->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" value=" " name="deskripsi">
                    </div>
                    <div class="form-group">
                        <label for="image">Foto Unit</label>
                        <input type="file" name="foto_unit" class="form-control" id="fotoUnit" value=" "
                            aria-describedby="image">
                        {{-- <img src="{{asset('storage/'.$sepeda->foto_unit) }}"> --}}
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="dipinjam">dipinjam</option>
                            <option value="tersedia">tersedia</option>
                        </select>

                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>


            {{-- Tabel --}}
            <div class=" table-responsive" style="display : block;" id="sepedaTable">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Unit Code</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Foto Unit</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sepeda as $spd) <tr>

                            <td>{{$spd->unit_code}}</td>
                            <td>{{$spd->kategori->nama_kategori}}</td>
                            <td>{{$spd->deskripsi}}</td>
                            <td><img width=" 80px" src="{{asset('storage/'.$spd->foto_unit) }}"></td>
                            <td>{{$spd->status}}</td>
                            <td>
                                {{-- <button class="btn btn-primary" data-mytitle="hello" data-idsepeda="{{$spd->id_sepeda}}"
                                data-unitcode="{{$spd->unit_code}}"
                                data-kategori="{{$spd->kategori->nama_kategori}}"
                                data-deskripsi="{{$spd->deskripsi}}"
                                data-foto="{{asset('storage/'.$spd->foto_unit) }}" data-status="{{$spd->status}}"
                                data-toggle="collapse" data-target="#formEditSepeda">Edit</button> --}}
                                <a href="{{route('sepeda.edit', $spd->id_sepeda)}}">Edit</a>
                                <button type=" submit" class="btn btn-danger">Delete</button>
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
    function showFormAddSepeda(){
        console.log('OK')
        var formAdd = document.getElementById('formAddSepeda');
        var sepedaTable = document.getElementById('sepedaTable');
        var search = document.getElementById('search');
        if (formAdd.style.display === "none") {
            formAdd.style.display = "";
            sepedaTable.style.display = "none";
            search.style.opacity= "0";
        } else {
            formAdd.style.display = "none";
            sepedaTable.style.display = "block";
            search.style.opacity = "1";
        }
    }

</script>




@endsection
