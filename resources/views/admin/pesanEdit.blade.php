@extends('layouts.admin')
@section('content')
<div class="page-body">
    <div class="card">
        <div class="collapse mx-3 mb-3" style="display:block" id="formEditPesan">
            <h4 class=" mb-3">Edit Pesan Baru</h4>
            <form method="post" action="{{ route('pesan.update', $pesan->id_pesan)}}" id="myForm"
                enctype="multipart/form-data">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <input type="hidden" name="id_pesan" id="idPesan" value="">
                <div class="form-group">
                    <label for="judul_pesan">Judul Pesan</label>
                    <input type="text" class="form-control" id="judul_pesan" value="{{$pesan->judul_pesan}} "
                        placeholder="Masukkan judul pesan" name="judul_pesan">
                </div>
                <div class="form-group">
                    <label for="image">Foto Pesan</label>
                    <input type="file" name="foto_pesan" class="form-control" id="fotoPesan"
                        value="{{ $pesan->foto_pesan }}" aria-describedby="image">
                    <img src="{{asset('storage/'.$pesan->foto_pesan) }}" width="200px">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" value="{{$pesan->deskripsi}}"
                        name="deskripsi">
                </div>
                <a type="button" class="btn btn-primary btn-outline-primary" href="{{route('pesan.index')}}">back</a>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</div>

@endsection