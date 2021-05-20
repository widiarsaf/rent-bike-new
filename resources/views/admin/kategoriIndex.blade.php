@extends('layouts.admin')
@section('content')
<div class="page-body">
    <div class="card">
        <div class="card-header">
            <h5>Tabel Kategori</h5>
            <span>Daftar Kategori Sepeda yang Tersedia</span>
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
                <button class="btn btn-primary ml-3" data-toggle="modal" data-target="#add"><i
                        class="ti-plus"></i>Tambah Data</button>
            </div>
            <div class="table-responsive">
                <table class=" table table-hover">
                    <thead>
                        <tr>
                            <th>No </th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($kategori as $ktg) <tr>

                            <th scope="row">{{$no++}}</th>

                            <td>{{$ktg->nama_kategori}}</td>
                            <td>
                                <button class="btn btn-warning" data-namakategori="{{$ktg->nama_kategori}}"
                                    data-idkategori="{{$ktg->id_kategori}}" data-toggle="modal" data-target="#edit"><i
                                        class="ti-marker-alt"></i></button>
                                <button class="btn btn-danger" data-idkategori="{{$ktg->id_kategori}}"
                                    data-idkategori="{{$ktg->id_kategori}}" data-toggle="modal" data-target="#delete"><i
                                        class="ti-trash"></i></button>
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

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Kategori Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('kategori.store')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md col-form-label">Masukkan Nama Kategori</label>
                        <div class="col-sm-12">
                            <input type="text" name="nama_kategori" id="namaKategori" class="form-control">
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

{{-- Modal Edit --}}
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Ubah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('kategori.update', 'test')}}" method="post">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="id_kategori" id="idKategori" value="">
                    <div class="form-group">
                        <label class="col-md col-form-label">Masukkan Nama Kategori</label>
                        <div class="col-sm-12">
                            <input type="text" name="nama_kategori" id="namaKategori" class="form-control">
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
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Hapus Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('kategori.destroy', 'test')}}" method="post">
                {{method_field('DELETE')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-center"><i class="ti-alert" style="font-size:100px; color: #e86464"></i></p>
                    <p class="text-center" style="font-size:20px; color: #e86464">
                        Yakin untuk menghapus data ini?
                    </p>
                    <input type="hidden" name="id_kategori" id="idKategori" value="">

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
