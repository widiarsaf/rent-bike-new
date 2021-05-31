@extends('layouts.admin')
@section('content')
<div class="page-body">
    <div class="card">
        <div class="card-header">
            <h5>Tabel Katalog</h5>
            <span>Daftar Katalog Sepeda yang Tersedia</span>
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
            <div class="d-flex mb-3">
                <button class="btn btn-primary ml-3" data-toggle="modal" data-target="#addKatalog"><i
                        class="ti-plus"></i>Tambah Data</button>
            </div>
            <div class="table-responsive">
                <table class=" table table-hover" id="tabelKatalog">
                    <thead>
                        <tr>
                            <th>No </th>
                            <th>Nama Katalog</th>
                            <th>Deskripsi Katalog</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($katalog as $katalog) <tr>

                            <th scope="row">{{$no++}}</th>

                            <td>{{$katalog->nama_katalog}}</td>
                            <td>{{$katalog->deskripsi_katalog}}</td>
                            <td>
                                <button class="btn btn-warning" data-namakatalog="{{$katalog->nama_katalog}}"
                                    data-idkatalog="{{$katalog->id_katalog}}"
                                    data-deskripsikatalog="{{$katalog->deskripsi_katalog}}" data-toggle="modal"
                                    data-target="#editKatalog"><i class="ti-marker-alt"></i></button>
                                <button class="btn btn-danger" data-namakatalog="{{$katalog->nama_katalog}}"
                                    data-idkatalog="{{$katalog->id_katalog}}"
                                    data-deskripsikatalog="{{$katalog->deskripsi_katalog}}" data-toggle="modal"
                                    data-target="#deleteKatalog"><i class="ti-trash"></i></button>
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

<div class="modal fade" id="addKatalog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Katalog Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('katalog.store')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md col-form-label">Masukkan Nama Katalog</label>
                        <div class="col-sm-12">
                            <input type="text" name="nama_katalog" id="namaKatalog" placeholder="ex: Katalog 1"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md col-form-label">Masukkan Deskripsi Katalog</label>
                        <div class="col-sm-12">
                            <textarea type="text" name="deskripsi_katalog" id="deskripsiKatalog"
                                class="form-control"></textarea>
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
<div class="modal fade" id="editKatalog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Ubah Katalog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('katalog.update', 'test')}}" method="post">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="id_katalog" id="idKatalog" value="">
                    <div class="form-group">
                        <label class="col-md col-form-label">Masukkan Nama Katalog</label>
                        <div class="col-sm-12">
                            <input type="text" name="nama_katalog" id="namaKatalog" placeholder="ex: Katalog 1"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md col-form-label">Masukkan Deskripsi Katalog</label>
                        <div class="col-sm-12">
                            <textarea type="text" name="deskripsi_katalog" id="deskripsiKatalog"
                                class="form-control"></textarea>
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
<div class="modal fade" id="deleteKatalog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Hapus Katalog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('katalog.destroy', 'test')}}" method="post">
                {{method_field('DELETE')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-center"><i class="ti-alert" style="font-size:100px; color: #e86464"></i></p>
                    <p class="text-center" style="font-size:20px; color: #e86464">
                        Yakin untuk menghapus data ini?
                    </p>
                    <input type="hidden" name="id_katalog" id="idKatalog" value="">

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