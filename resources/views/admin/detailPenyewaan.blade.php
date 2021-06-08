@extends('layouts.admin')
@section('content')
<div class="page-body">
    <div class="card">
        <div>
        <a type="button" class = "btn btn-success" target = "_blank"href="{{route('printNota', $penyewaan->id_penyewaan)}}">Print Nota</a>
        </div>
        <div style="margin-top:20px;">
                <center>
                    <img src="{{asset('assets/assetsAdmin/images/logo.jpg')}}" alt="" width="70px">
                    <p style="margin-top:-10px;"><b>GOWESLURR</b></p>
                    <p>Jln. Kesatria E2</p>
                    <p>instagram.com/gowesslurr_malang</p>
                </center>
            </div>
            <hr style="color: rgb(172, 172, 172) !important">
            <div class="penyewaanDetail">
                <center>
                    <p>{{$penyewaan->user->username}}</p>
                </center>
            </div>
            <div>
                <center>
                    <p>Invoice# {{$penyewaan->no_nota}}</p>
                    <p>Date {{$convertToString}}</p>
                </center>
            </div>
            
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Metode</th>
                        <th>P#</th>
                        <th>U#</th>
                        <th>Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($pembayaran as $pembayaran)
                        @if($penyewaan->no_nota === $pembayaran->nota_no)
                        <td>
                            @if($pembayaran->metode)
                            Cash
                            @else
                            Transfer
                            @endif
                        </td>
                        <td>{{$countGroupPaket}}</td>
                        <td>{{$countGroupSepeda}}</td>
                        <td>{{$pembayaran->nominal}}</td>
                        @endif
                        @endforeach
                    </tr>
                </tbody>
            </table>
            
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Paket</th>
                        <th>Unit Code</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailPenyewaan as $detailPenyewaan)
                    @if($penyewaan->no_nota === $detailPenyewaan->nota_no)
                    <tr>
                        <td>{{$detailPenyewaan->paket->nama_paket}}</td>
                        <td>{{$detailPenyewaan->sepeda->unit_code}}</td>
                        <td>{{$detailPenyewaan->paket->harga}}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            <hr>
            
            <div
                style="align-items: flex-end !important; justify-content: flex-end !important; padding: 10px 0px;padding-left: 10px; border-top: 1px solid black; border-bottom: 1px solid rgb(182, 182, 182)">
                <div>
                    <table>
                        <tbody>
                            <tr>
                                <td>SubTotal</td>
                                <td>: Rp {{$total}}</td>
                            </tr>
                            <tr>
                                <td><b> GrandTotal</b></td>
                                <td><b>: Rp {{$total}} </b></td>
                            </tr>
                            <tr>
                                <td><b>Kembalian</b></td>
                                <td><b>: Rp {{$kembalian}}</b></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
@endsection