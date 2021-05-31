@extends('layouts.admin')
@section('content')
<div class="page-body">
    <div class="card">
        <div class="collapse mx-3 mb-3" style="display:block" id="formEditSepeda">
            <h4 class=" mb-3">Edit Sepeda Baru</h4>
            <form method="post" action="{{ route('sepeda.update', $sepeda->id_sepeda)}}" id="myForm"
                enctype="multipart/form-data">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <input type="hidden" name="id_sepeda" id="idSepeda" value="">
                <div class="form-group">
                    <label for="unit_code">Unit Code</label>
                    <input type="text" class="form-control" id="unitCode" value="{{$sepeda->unit_code}} "
                        placeholder="Masukkan code unit" name="unit_code">
                </div>
                <div class="form-group">
                    <label for="kategori_id">Kategori</label>
                    <select name="kategori_id" id="kategoriId" class="form-control">
                        @foreach($kategori as $ktg)
                        <option value="{{$ktg->id_kategori}}"
                            {{$sepeda->kategori_id == $ktg->id_kategori ? 'selected' : ''}}>{{$ktg->nama_kategori}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Katalog">Katalog</label>
                    <select name="katalog_id" id="katalog_id" class="form-control">
                        @foreach($katalog as $katalog)
                        <option value="{{$katalog->id_katalog}}"
                            {{$sepeda->katalog_id == $katalog->id_katalog ? 'selected' : ''}}>
                            {{$katalog->nama_katalog}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" value="{{$sepeda->deskripsi}}"
                        name="deskripsi">
                </div>
                <div class="form-group">
                    <label for="image">Foto Unit</label>
                    <input type="file" name="foto_unit" class="form-control" id="fotoUnit"
                        value="{{ $sepeda->foto_unit }}" aria-describedby="image">
                    <img src="{{asset('storage/'.$sepeda->foto_unit) }}" width="200px">
                </div>
                <a type="button" class="btn btn-primary btn-outline-primary" href="{{route('sepeda.index')}}">back</a>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</div>

@endsection