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
					<img src="{{asset('storage/'.$sepeda->foto_unit) }}" alt="">
				</div>
			</div>
			<div class="col-md-8">
				<div class="single-product-content">
					<h4>{{$sepeda->katalog->nama_katalog}}</h4>
					<h3>{{$sepeda->unit_code}}</h3>
					<p class=""><span>Kategori: </span>{{$sepeda->kategori->nama_kategori}} </p>
					<p>{{$sepeda->deskripsi}}</p>
					<a href="{{ route('sepedaCustomer') }}" class="cart-btn">
					Kembali</a>
						
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end single product -->
@endsection