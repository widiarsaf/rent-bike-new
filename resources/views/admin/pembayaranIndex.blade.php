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
            <h5>Tabel Pembayaran</h5>
            <span>Daftar Transaksi Pembayaran</span>
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
                        <button class="btn btn-primary ml-3" onclick="showFormaAddPembayaran(); return false;">
                            <i class="ti-plus"></i>
                            Tambah Data
                        </button>
                    </div>
                </div>
            </div>
            {{-- Form Add Data --}}
            <div class="mx-3 mb-3" style="display:none;" id="formAddPembayaran">
                <h4 class=" mb-3">Masukkan Data Pembayaran Baru</h4>
                <form method="post" action="{{ route('pembayaran.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nota_no">No_Nota</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan nomor nota"
                            name="nota_no">
                    </div>
                    <div class="form-group">
                        <label for="nama_pengirim">Nama Pengirim</label>
                        <input type="text" class="form-control" id="nama_pengirim" placeholder="Masukkan Nama Pembayar"
                            name="nama_pengirim">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_bayar">Tanggal Bayar</label>
                        <input type="date" class="form-control" id="tanggal_bayar" placeholder="Masukkan tanggal bayar"
                            name="tanggal_bayar">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" placeholder="Masukkan keterangan"
                            name="keterangan">
                    </div>
                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="integer" class="form-control" id="password"
                            placeholder="Masukkan nominal pembayaran" name="nominal">
                    </div>
                    <div class="form-group">
                        <label for="metode">Metode</label>
                        <input type="text" class="form-control" id="metode" placeholder="Masukkan metode pembayaran"
                            name="metode">
                    </div>
                    <div class="form-group">
                        <label for="foto_bukti">Foto Bukti</label>
                        <input type="file" class="form-control" id="foto_bukti" placeholder="Masukkan foto bukti"
                            name="foto_bukti">
                    </div>
                    <a type="button" id="close" class="btn btn-primary btn-outline-primary"
                        onclick="hideForm()">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            {{-- Tabel --}}
            <div class=" table-responsive" style="display: block;" id="pembayaranTable">
                <table class="table table-hover" id="tabelPenyewaan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Nota</th>
                            <th>Nama Pengirim</th>
                            <th>Tanggal Bayar</th>
                            <th>Keterangan</th>
                            <th>Nominal</th>
                            <th>Metode</th>
                            <th>Foto Bukti</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($pembayaran as $p)<tr>
                            <td>{{$no++}}</td>
                            <td>{{$p->nota_no}}</td>
                            <td>{{$p->nama_pengirim}}</td>
                            <td>{{$p->tanggal_bayar}}</td>
                            <td>{{$p->keterangan}}</td>
                            <td>{{$p->nominal}}</td>
                            <td>{{$p->metode}}</td>
                            <td><img width="80px" src="{{asset('storage/'.$p->foto_bukti) }}">
                            </td>
                            <td style="display: flex">
                                <a type="button" class="btn btn-warning"
                                    href="{{ route('pembayaran.edit', $p->id_pembayaran) }}"><i
                                        class="ti-marker-alt"></i></a>
                                <form style="margin-left: 5px"
                                    action="{{ route('pembayaran.destroy', $p->id_pembayaran) }}" method="POST">
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
    function showFormaAddPembayaran(){
        console.log('OK')
        var formAdd = document.getElementById('formAddPembayaran');
        var pembayaranTable = document.getElementById('pembayaranTable');
        var header = document.getElementById('header-content');
        if (formAdd.style.display === "none") {
            formAdd.style.display = "";
            pembayaranTable.style.display = "none";
            header.style.display ="none";
        } else {
            formAdd.style.display = "none";
            pembayaranTable.style.display = "";
            header.style.display ="block";
        }
    }

    function hideForm()
    {
        console.log('OK')
        var formAdd = document.getElementById('formAddPembayaran');
        var pembayaranTable = document.getElementById('pembayaranTable');
        var header = document.getElementById('header-content');
        if (formAdd.style.display === "") {
            formAdd.style.display = "none";
            pembayaranTable.style.display = "";
            header.style.display= "";
        }
    }

</script>

@endsection