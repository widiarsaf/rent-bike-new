@extends('layouts.admin')
@section('content')
<div class="page-body">
    <div class="card">
        <div class="collapse mx-3 mb-3" style="display:block" id="formEditPembayaran">
            <h4 class=" mb-3">Edit Data Pembayaran</h4>
            <form method="post" action="{{ route('pembayaran.update', $pembayaran->id_pembayaran)}}" id="myForm"
                enctype="multipart/form-data">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <div class="form-group">
                    <label for="nota_no">No_Nota</label>
                    <input type="text" readonly class="form-control" id="nama" placeholder="Masukkan nomor nota"
                        name="nota_no" value="{{$pembayaran->nota_no}}">
                </div>
                <div class="form-group">
                    <label for="nama_pengirim">Nama Pengirim</label>
                    <input type="text" class="form-control" id="nama_pengirim" placeholder="Masukkan Nama Pembayar"
                        name="nama_pengirim" value="{{$pembayaran->nama_pengirim}}">
                </div>
                <div class="form-group">
                    <label for="tanggal_bayar">Tanggal Bayar</label>
                    <input type="date" class="form-control" id="tanggal_bayar" placeholder="Masukkan tanggal bayar"
                        name="tanggal_bayar" value="{{$pembayaran->tanggal_bayar}}">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" placeholder="Masukkan keterangan"
                        name="keterangan" value="{{$pembayaran->keterangan}}">
                </div>
                <div class="form-group">
                    <label for="nominal">Nominal</label>
                    <input type="integer" class="form-control" id="password" placeholder="Masukkan nominal pembayaran"
                        name="nominal" value="{{$pembayaran->nominal}}">
                </div>
                <div class="form-group">
                    <label for="metode">Metode</label>
                    <input type="text" class="form-control" id="metode" placeholder="Masukkan metode pembayaran"
                        name="metode" value="{{$pembayaran->metode}}">
                </div>
                <div class="form-group">
                    <label for="foto_bukti">Foto Bukti</label>
                    <input type="file" class="form-control" id="foto_bukti" placeholder="Masukkan foto bukti"
                        name="foto_bukti">
                    <img src="{{asset('storage/'.$pembayaran->foto_bukti) }}" alt="">
                </div>
                <a type="button" class="btn btn-primary btn-outline-primary"
                    href="{{route('pembayaran.index')}}">back</a>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</div>

@endsection