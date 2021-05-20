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
            <div class="d-flex ml-3 mb-3">
                <div class="pcoded-search" style="width: 500px !important;">
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
                <button class="btn btn-primary ml-3" data-toggle="modal" data-target="#addPaket"><i
                        class="ti-plus"></i>Tambah Data</button>
            </div>
            <div class="table-responsive">
                {{-- Tabel --}}
                <table class=" table table-hover">
                    <thead>
                        <tr>
                            <th>No </th>
                            <th>Nama Paket</th>
                            <th>Jam</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($paket as $pkt) <tr>

                            <th scope="row">{{$no++}}</th>

                            <td>{{$pkt->nama_paket}}</td>
                            <td>{{$pkt->jam}}</td>
                            <td>{{$pkt->harga}}</td>
                            <td>
                                <button class="btn btn-warning" data-namapaket="{{$pkt->nama_paket}}"
                                    data-jam={{$pkt->jam}} data-harga={{$pkt->harga}} data-idpaket="{{$pkt->id_paket}}"
                                    data-toggle="modal" data-target="#editPaket"><i class="ti-marker-alt"></i></button>
                                <button class="btn btn-danger" data-idpaket="{{$pkt->id_paket}}" data-toggle="modal"
                                    data-target="#deletePaket"><i class="ti-trash"></i></button>
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

{{-- Modal Add--}}

<div class="modal fade" id="addPaket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Paket Penyewaan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('paket.store')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md col-form-label">Masukkan Nama Paket</label>
                        <div class="col-sm-12">
                            <input type="text" name="nama_paket" id="namaPaket" class="form-control">
                        </div>
                        <label class="col-md col-form-label">Masukkan Jam</label>
                        <div class="col-sm-12">
                            <input type="text" name="jam" id="jam" class="form-control">
                        </div>
                        <label class="col-md col-form-label">Masukkan Harga</label>
                        <div class="col-sm-12">
                            <input type="text" name="harga" id="harga" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
<div class="modal fade" id="editPaket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Ubah Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('paket.update', 'test')}}" method="post">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="id_paket" id="idPaket" value="">
                    <div class="form-group">
                        <label class="col-md col-form-label">Masukkan Nama Paket</label>
                        <div class="col-sm-12">
                            <input type="text" name="nama_paket" id="namaPaket" class="form-control">
                        </div>
                        <label class="col-md col-form-label">Masukkan Jam</label>
                        <div class="col-sm-12">
                            <input type="text" name="jam" id="jam" class="form-control">
                        </div>
                        <label class="col-md col-form-label">Masukkan Harga</label>
                        <div class="col-sm-12">
                            <input type="text" name="harga" id="harga" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- Modal Delete --}}
<div class="modal fade" id="deletePaket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Hapus Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('paket.destroy', 'test')}}" method="post">
                {{method_field('DELETE')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-center"><i class="ti-alert" style="font-size:100px; color: #e86464"></i></p>
                    <p class="text-center" style="font-size:20px; color: #e86464">
                        Yakin untuk menghapus data ini?
                    </p>
                    <input type="hidden" name="id_paket" id="idPaket" value="">

                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
