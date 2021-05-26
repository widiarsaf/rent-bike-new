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

{{-- Product --}}

<div class="product-section mt-150 mb-150">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".mtb">MTB</li>
                        <li data-filter=".fixie">FIXIE</li>
                        <li data-filter=".roadbike">ROAD BIKE</li>
                        <li data-filter=".seli">SELI</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists">
            {{-- MTB --}}
            @foreach($mtb as $mtb)
            <div class="col-lg-3 col-md-4 text-center mtb">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html"><img src="{{asset('storage/'.$mtb->foto_unit) }}"
                                alt="{{$mtb->unit_code}} photo"></a>
                    </div>
                    <h3>{{$mtb->unit_code}}</h3>
                    <h4>{{$mtb->kategori->nama_kategori}}</h4>
                    <p class="product-status"><span>Status</span>
                        @if($mtb->status)
                        <span style="color: rgb(177, 57, 57) !important; font-weight:bold"> Di Sewa </span>
                        @else
                        <span style="font-weight:bold"> Tersedia </span>
                        @endif</p>
                    </p>
                    <a href="{{ route('product.detail',$mtb->id_sepeda) }}" class="cart-btn"><i
                            class="fas fa-shopping-cart"></i> Add to Cart</a>

                </div>
            </div>
            @endforeach

            {{-- FIXIE --}}
            @foreach($fixie as $fixie)
            <div class="col-lg-3 col-md-4 text-center fixie">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html"><img src="{{asset('storage/'.$fixie->foto_unit) }}"
                                alt="{{$fixie->unit_code}} photo"></a>
                    </div>
                    <h3>{{$fixie->unit_code}}</h3>
                    <h4>{{$fixie->kategori->nama_kategori}}</h4>
                    <p class="product-status"><span>Status</span>
                        @if($fixie->status)
                        <span style="color: rgb(177, 57, 57) !important; font-weight:bold"> Di Sewa </span>
                        @else
                        <span style="font-weight:bold"> Tersedia </span>
                        @endif</p>
                    </p>
                    <a href="{{ route('product.detail',$fixie->id_sepeda) }}" class="cart-btn"><i
                            class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
            @endforeach

            {{-- ROAD BIKE --}}
            @foreach($roadbike as $rb)
            <div class="col-lg-3 col-md-4 text-center roadbike">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html"><img src="{{asset('storage/'.$rb->foto_unit) }}"
                                alt="{{$rb->unit_code}} photo"></a>
                    </div>
                    <h3>{{$rb->unit_code}}</h3>
                    <h4>{{$rb->kategori->nama_kategori}}</h4>
                    <p class="product-status"><span>Status</span>
                        @if($rb->status)
                        <span style="color: rgb(177, 57, 57) !important; font-weight:bold"> Di Sewa </span>
                        @else
                        <span style="font-weight:bold"> Tersedia </span>
                        @endif</p>
                    </p>
                    <a href="{{ route('product.detail',$rb->id_sepeda) }}" class="cart-btn"><i
                            class="fas fa-shopping-cart"></i>
                        Add to Cart</a>
                </div>
            </div>
            @endforeach

            {{-- SELI --}}
            @foreach($seli as $seli)
            <div class="col-lg-3 col-md-4 text-center seli">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html"><img src="{{asset('storage/'.$seli->foto_unit) }}"
                                alt="{{$seli->unit_code}} photo"></a>
                    </div>
                    <h3>{{$seli->unit_code}}</h3>
                    <h4>{{$seli->kategori->nama_kategori}}</h4>
                    <p class="product-status"><span>Status</span>
                        @if($seli->status)
                        <span style="color: rgb(177, 57, 57) !important; font-weight:bold"> Di Sewa </span>
                        @else
                        <span style="font-weight:bold"> Tersedia </span>
                        @endif</p>
                    <a href="{{ route('product.detail',$seli->id_sepeda) }}" class="cart-btn"><i
                            class="fas fa-shopping-cart"></i>
                        Add to Cart</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end products -->
@endsection