@extends('layouts.admin')
@section('content')
<div class="page-body">
    <div class="card">
        <div class="collapse mx-3 mb-3" style="display:block" id="formEditGaleri">
            <h4 class=" mb-3">Edit Galeri Baru</h4>
            <form method="post" action="{{ route('galeri.update', $galeri->id)}}" id="myForm"
                enctype="multipart/form-data">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <input type="hidden" name="id" id="idGaleri" value="">
                <div class="form-group">
                    <label for="image">Foto</label>
                    <input type="file" name="foto" class="form-control" id="fotoGaleri"
                        value="{{ $galeri->foto }}" aria-describedby="image">
                    <img src="{{asset('storage/'.$galeri->foto) }}" width="200px">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" value="{{$galeri->nama}} "
                        placeholder="Masukkan nama" name="nama">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" value="{{$galeri->deskripsi}}"
                        name="deskripsi">
                </div>
                <a type="button" class="btn btn-primary btn-outline-primary" href="{{route('galeri.index')}}">back</a>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</div>

@endsection