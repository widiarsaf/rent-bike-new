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
            <div id="header-content">
                <div class="header">
                    <div class="d-flex mb-4" style="justify-content :space-between">
                        <button class="btn btn-primary ml-3" onclick="showFormAddSepeda(); return false;">
                            <i class="ti-plus"></i>
                            Tambah Data
                        </button>
                    </div>
                </div>
            </div>
            {{-- Form Add Data --}}
            <div class="mx-3 mb-3" style="display:none;" id="formAddSepeda">
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
                        <label for="katalog">Katalog</label>
                        <input type="text" class="form-control" id="katalog" placeholder="Masukkan katalog"
                            name="katalog">
                    </div>

                    <a type="button" id="close" class="btn btn-primary btn-outline-primary"
                        onclick="hideForm()">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            {{-- Tabel --}}
            <div class=" table-responsive" style="display : block;" id="sepedaTable">
                <table class="table table-hover" id="tabelSepeda">
                    <thead>
                        <tr>
                            <th>Unit Code</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Foto Unit</th>
                            <th>Katalog</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sepeda as $spd) <tr>

                            <td>{{$spd->unit_code}}</td>
                            <td>{{$spd->kategori->nama_kategori}}</td>
                            <td>
                                <p class="long-text">{{$spd->deskripsi}}<p>
                            </td>
                            <td><img width=" 80px" src="{{asset('storage/'.$spd->foto_unit) }}">
                            </td>
                            <td>{{$spd->katalog}}</td>
                            <td style="display: flex">
                                <a type="button" class="btn btn-warning"
                                    href="{{ route('sepeda.edit', $spd->id_sepeda) }}"><i class="ti-marker-alt"></i></a>
                                <form style="margin-left: 5px" action="{{ route('sepeda.destroy', $spd->id_sepeda) }}"
                                    method="POST">
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
    function showFormAddSepeda(){
        console.log('OK')
        var formAdd = document.getElementById('formAddSepeda');
        var sepedaTable = document.getElementById('sepedaTable');
        var header = document.getElementById('header-content');
        if (formAdd.style.display === "none") {
            formAdd.style.display = "";
            sepedaTable.style.display = "none";
            header.style.display ="none";
        } else {
            formAdd.style.display = "none";
            sepedaTable.style.display = "";
            header.style.display ="block";
        }
    }

    function hideForm()
    {
        console.log('OK')
        var formAdd = document.getElementById('formAddSepeda');
        var sepedaTable = document.getElementById('sepedaTable');
        var header = document.getElementById('header-content');
        if (formAdd.style.display === "") {
            formAdd.style.display = "none";
            sepedaTable.style.display = "";
            header.style.display= "";
        }
    }

</script>




@endsection