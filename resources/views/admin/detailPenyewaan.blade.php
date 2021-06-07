@extends('layouts.admin')
@section('content')
<div class="page-body">
    <div class="card">
        <div>
            <a href="{{route('printNota', $penyewaan->id_penyewaan)}}" target="_blank">Print Nota</a>
        </div>

        <div class="penyewaanDetail">
            <p>No Nota = {{$penyewaan->no_nota}}</p>
            <p>Nama = {{$penyewaan->user->username}}</p>
            <p>Tanggal Sewa = {{$penyewaan->tanggal}}</p>
            <p>Jam Sewa = {{$penyewaan->jam}}</p>
            <p>Total Biaya = {{$penyewaan->total_biaya}}</p>
        </div>
        <div class="sepedaDetail">
            @foreach ($detailPenyewaan as $detailPenyewaan)
            @if($penyewaan->no_nota === $detailPenyewaan->nota_no)
            <li>{{$detailPenyewaan->sepeda->unit_code}} - {{$detailPenyewaan->paket->nama_paket}} - {{$detailPenyewaan->paket->harga}}</li>
            @endif
            @endforeach


        </div>
        <div class="pembayaranDetail">
            @foreach ($pembayaran as $pembayaran)
            @if($penyewaan->no_nota === $pembayaran->nota_no)
            <li>{{$pembayaran->metode}}</li>
            <li>U# {{$countGroupSepeda}}</li>
            <li>P# {{$countGroupPaket}}</li>
            <li>{{$pembayaran->nominal}}</li>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection