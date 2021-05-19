@extends('layouts.admin')
@section('content')
<div class="collapse mx-3 mb-3" style="display:block" id="formEditSepeda">
    <h4 class=" mb-3">Edit Sepeda Baru</h4>
    <form method="post" action="{{ route('sepeda.update', 'test')}}" id="myForm" enctype="multipart/form-data">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <input type="hidden" name="id_sepeda" id="idSepeda" value="">
        <div class="form-group">
            <label for="unit_code">Unit Code</label>
            <input type="text" class="form-control" id="unitCode" value=" " placeholder="Masukkan code unit"
                name="unit_code">
        </div>
        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select name="kategori_id" id="kategoriId" class="form-control">
                @foreach($kategori as $ktg)
                <option value="{{$ktg->id_kategori}}">{{$ktg->nama_kategori}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" value=" " name="deskripsi">
        </div>
        <div class="form-group">
            <label for="image">Foto Unit</label>
            <input type="file" name="foto_unit" class="form-control" id="fotoUnit" value=" " aria-describedby="image">
            {{-- <img src="{{asset('storage/'.$sepeda->foto_unit) }}"> --}}
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="dipinjam">dipinjam</option>
                <option value="tersedia">tersedia</option>
            </select>

        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>

@endsection
