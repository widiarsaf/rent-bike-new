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
            <div class="header">
                <div class="d-flex mb-4" style="justify-content :space-between">
                    <button class="btn btn-primary ml-3" onclick="showFormAddSepeda(); return false;">
                        <i class="ti-plus"></i>
                        Tambah Data
                    </button>
                </div>
            </div>
            {{-- Form Add Data --}}
            {{-- <div class="mx-3 mb-3" style="display:none;" id="formAddSepeda">
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

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div> --}}

    {{-- Tabel --}}
    <div class=" table-responsive" style="display : block;" id="penyewaanTable">
        <table class="table table-hover" id="tabelPenyewaan">
            <thead>
                <tr>
                    <th>No Nota</th>
                    <th>Nama</th>
                    <th>Total Harga</th>
                    <th>Tanggal Sewa</th>
                    <th>Status Pembayaran</th>
                    <th>Status Pengembalian</th>
                    <th>Status Jaminan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penyewaan as $p) <tr>
                    <th style="background: rgb(244, 252, 226)">{{$p->no_nota}}</th>
                    <td>{{$p->user->nama}}</td>
                    <td>{{$p->total_biaya}}</td>
                    <td>{{$p->tanggal}}</td>
                    <td>
                        <div id="pembayaran{{$p->id_penyewaan}}" style="justify-content: space-between; display:flex">
                            <center>
                                @if($p->status_pembayaran == 0)
                                <div
                                    style="background-color: rgb(233, 76, 76) !important; color:rgb(241, 241, 241); border-radius:5px; padding: 5px; min-width: 100px">
                                    Belum
                                    Lunas</div>
                                @elseif($p->status_pembayaran == 1)
                                <div
                                    style="background-color: rgb(231, 183, 79) !important; color:rgb(241, 241, 241); border-radius:5px; padding: 5px; min-width: 100px">
                                    DP</div>
                                @else
                                <div
                                    style="background-color: rgb(69, 206, 51) !important; color:rgb(241, 241, 241); border-radius:5px; padding: 5px; min-width: 100px">
                                    Lunas</div>
                                @endif
                            </center>
                            <a type="button" class="btn" href=""
                                onclick="$('#editPembayaran{{$p->id_penyewaan}}').show(); $('#pembayaran{{$p->id_penyewaan}}').hide(); return false; ">
                                <i class="ti-marker-alt"></i></a>
                        </div>
                        <form id="editPembayaran{{$p->id_penyewaan}}"
                            action="{{route('penyewaan.updateStatus', $p->id_penyewaan)}}" style="display: none">
                            <select name="pembayaran">
                                <option value="0">Belum Lunas</option>
                                <option value="1">DP</option>
                                <option value="2">Lunas</option>
                            </select>
                            <button class="btn btn-sm btn-primary">done</button>
                            <a type="button" class="btn" href=""
                                onclick="$('#editPembayaran{{$p->id_penyewaan}}').hide(); $('#pembayaran{{$p->id_penyewaan}}').show(); return false; ">&times;</a>
                        </form>
                    </td>
                    <td>
                        <div id="pengembalian{{$p->id_penyewaan}}" style="justify-content: space-between; display:flex">
                            <center>
                                @if($p->status_pengembalian == 0)
                                <div
                                    style="background-color: rgb(233, 76, 76) !important; color:rgb(241, 241, 241); border-radius:5px; padding: 5px; min-width: 100px">
                                    Belum</div>
                                @else
                                <div
                                    style="background-color: rgb(69, 206, 51) !important; color:rgb(241, 241, 241); border-radius:5px; padding: 5px; min-width: 100px">
                                    Sudah</div>
                                @endif
                            </center>
                            <a type="button" class="btn" href=""
                                onclick="$('#editPengembalian{{$p->id_penyewaan}}').show(); $('#pengembalian{{$p->id_penyewaan}}').hide(); return false; ">
                                <i class="ti-marker-alt"></i></a>
                        </div>
                        <form id="editPengembalian{{$p->id_penyewaan}}"
                            action="{{route('penyewaan.updateStatus', $p->id_penyewaan)}}" style="display: none">
                            <select name="pengembalian">
                                <option value="0">Belum</option>
                                <option value="1">Sudah</option>
                            </select>
                            <button class="btn btn-sm btn-primary">done</button>
                            <a type="button" class="btn" href=""
                                onclick="$('#editPengembalian{{$p->id_penyewaan}}').hide(); $('#pengembalian{{$p->id_penyewaan}}').show(); return false; ">&times;</a>
                        </form>
                    </td>
                    <td>
                        <div id="jaminan{{$p->id_penyewaan}}" style="justify-content: space-between; display:flex">
                            <center>
                                @if($p->status_jaminan == 0)
                                <div
                                    style="background-color: rgb(233, 76, 76) !important; color:rgb(241, 241, 241); border-radius:5px; padding: 5px; min-width: 100px">
                                    Belum</div>
                                @else
                                <div
                                    style="background-color: rgb(69, 206, 51) !important; color:rgb(241, 241, 241); border-radius:5px; padding: 5px; min-width: 100px">
                                    Sudah</div>
                                @endif
                            </center>
                            <a type="button" class="btn" href=""
                                onclick="$('#editJaminan{{$p->id_penyewaan}}').show(); $('#jaminan{{$p->id_penyewaan}}').hide(); return false; ">
                                <i class="ti-marker-alt"></i></a>
                        </div>
                        <form id="editJaminan{{$p->id_penyewaan}}"
                            action="{{route('penyewaan.updateStatus', $p->id_penyewaan)}}" style="display: none">
                            <select name="jaminan">
                                <option value="0">Belum</option>
                                <option value="1">Sudah</option>
                            </select>
                            <button class="btn btn-sm btn-primary">done</button>
                            <a type="button" class="btn" href=""
                                onclick="$('#editJaminan{{$p->id_penyewaan}}').hide(); $('#jaminan{{$p->id_penyewaan}}').show(); return false; ">&times;</a>
                        </form>
                    </td>
                    <td style="display: flex">
                        <form style="margin-left: 5px" action="{{ route('penyewaan.destroy', $p->id_penyewaan) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="ti-trash"></i></button>
                            <a class="btn btn-inverse" data-toggle="tooltip" style="color:white"
                                data-original-title="lihat detail"><i class="ti-zoom-in"></i>Lihat Detail</a>
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
@endsection