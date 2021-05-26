@extends('layouts.customer')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Trendy and Cool</p>
                    <h1>Sepeda</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- single product -->
<div class="single-product mt-100 mb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-product-img">
                    <img src="{{asset('storage/'.$product->foto_unit) }}" alt="">
                </div>
            </div>
            <div class="col-md-8">
                <div class="single-product-content">
                    <h3>{{$product->unit_code}}</h3>
                    <p class="single-product-pricing"><span>Kategori: </span>{{$product->kategori->nama_kategori}} </p>
                    <p>{{$product->deskripsi}}</p>
                    <div class="single-product-form">
                        @guest
                        @if(Route::has('login'))
                        <form action="#">
                            <label for="Paket">Pilih Paket</label>
                            <select name="paket_id" id="paket_id" class="form-control col-md-5 mb-3" width="300px">
                                @foreach($paket as $pkt)
                                <option value="{{$pkt->id_paket}}">{{$pkt->nama_paket}}</option>
                                @endforeach
                            </select>
                            <a href="{{route('login')}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to
                                Cart</a>
                        </form>
                        @endif
                        @else
                        <form action="{{route('cart.store')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$product->id_sepeda}}" name="sepeda_id">
                            <input type="hidden" value="{{Auth::user()->id_pengguna }}" name="pengguna_id">
                            <label for="Paket">Pilih Paket</label>
                            <select name="paket_id" id="paket_id" class="form-control col-md-8 mb-3" width="300px">
                                @foreach($paket as $pkt)
                                <option value="{{$pkt->id_paket}}">{{$pkt->nama_paket}} - {{$pkt->jam}} jam -
                                    {{$pkt->harga}}</option>
                                @endforeach
                            </select>
                            @if($product->status)
                            <button disabled="disabled" class="cart-btn2"><i class="fas fa-shopping-cart"></i> Add to
                                Cart</button>
                            @else
                            <button class="cart-btn2"><i class="fas fa-shopping-cart"></i> Add to
                                Cart</button>
                            @endif
                        </form>
                        @endguest
                        <p>Status: <strong style="font-size: 18px">
                                @if($product->status)
                                <span style="color: rgb(177, 57, 57) !important; font-weight:bold">Di Sewa</span>
                                @else
                                <span style="font-weight:bold">Tersedia</span>
                                @endif
                            </strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end single product -->
@endsection