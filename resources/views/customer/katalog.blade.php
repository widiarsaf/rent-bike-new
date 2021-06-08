@extends('layouts.customer')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Trendy and Cool</p>
					<h1>Katalog Sepeda</h1>
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
						<li data-filter=".katalog1">Katalog 1</li>
						<li data-filter=".katalog2">Katalog 2</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row product-lists">
			{{-- KATALOG 1--}}
			@foreach($sepeda as $katalog1)
			@if($katalog1->katalog->nama_katalog == 'Katalog 1')
			<div class="col-lg-3 col-md-4 text-center katalog1">
				<div class="single-product-item">
					<div class="product-image">
						<a href="single-product.html"><img src="{{asset('storage/'.$katalog1->foto_unit) }}"
								alt="{{$katalog1->unit_code}} photo"></a>
					</div>
					<h3>{{$katalog1->unit_code}}</h3>
					<h4>{{$katalog1->kategori->nama_kategori}}</h4>
					<h5>{{$katalog1->katalog->nama_katalog}}</h5>
					</p>
					<a href="{{ route('sepedaCustomerDetail',$katalog1->id_sepeda) }}" class="cart-btn">
						Lihat Detail</a>

				</div>
			</div>
			@endif
			@endforeach
			@foreach($sepeda as $katalog2)
			@if($katalog1->katalog->nama_katalog == 'Katalog 2')
			<div class="col-lg-3 col-md-4 text-center katalog2">
				<div class="single-product-item">
					<div class="product-image">
						<a href="single-product.html"><img src="{{asset('storage/'.$katalog2->foto_unit) }}"
								alt="{{$katalog2->unit_code}} photo"></a>
					</div>
					<h3>{{$katalog2->unit_code}}</h3>
					<h4>{{$katalog2->kategori->nama_kategori}}</h4>
					<h5>{{$katalog2->katalog->nama_katalog}}</h5>
					</p>
					<a href="{{ route('sepedaCustomerDetail',$katalog2->id_sepeda) }}" class="cart-btn">
						Lihat Detail</a>
			
				</div>
			</div>
			@endif
			@endforeach

		
		</div>
	</div>
</div>
<!-- end products -->
@endsection