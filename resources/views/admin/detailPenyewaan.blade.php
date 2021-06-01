@extends('layouts.admin')
@section('content')
<div class="page-body">
    <div class="card">
        <div class="penyewaanDetail">
            <p>No Nota = {{$penyewaan->no_nota}}</p>
            <p>Nama = {{$penyewaan->user->username}}</p>
            <p>Tanggal Sewa = {{$penyewaan->tanggal}}</p>
            <p>Jam Sewa = {{$penyewaan->jam}}</p>
            <p>Total Biaya = {{$penyewaan->total_biaya}}</p>
            <p>Paket = {{$penyewaan->paket->nama_paket}}</p>
        </div>
        <div class="sepedaDetail">
            @foreach ($detailPenyewaan as $detailPenyewaan)
            @if($penyewaan->no_nota === $detailPenyewaan->nota_no)
            <li>{{$detailPenyewaan->sepeda->unit_code}}</li>
            @endif
            @endforeach


        </div>
        <div class="pembayaranDetail">

        </div>
    </div>
</div>
@endsection