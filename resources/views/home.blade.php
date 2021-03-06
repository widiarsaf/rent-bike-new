@extends('layouts.customer')
@section('content')
    <!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Let's Get Healthy</p>
							<h1>GOWESSLURR MALANG RENT BIKE</h1>
							<div class="hero-btns">
								<a href="{{route('sepedaCustomer')}}" class="boxed-btn">Bike Collection</a>
								<a href="{{url('about')}}" class="bordered-btn">About Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	<!-- end hero area -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-map-marker-alt"></i>
						</div>
						<div class="content">
							<h3>Easy To Access</h3>
							<p>Easy to reach and strategically located</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Support</h3>
							<p>Get support all day</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-thumbs-up"></i>
						</div>
						<div class="content">
							<h3>Trusted</h3>
							<p>Customer trust is our priority!</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->

    <!-- advertisement section -->
	<div class="abt-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
						<a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Since Year 2020</p>
						<h2>We are <span class="orange-text">GOWESSLURR</span></h2>
						<p>Gowesslurr Malang Rent Bike adalah tempat penyewaan sepeda berlokasi di Jl. Terusan Kesatrian No.Dalam, Kesatrian, Kec.
						Blimbing, Kota Malang, Jawa Timur 65126. Berlokasi strategis menjadikan Gowesslurr tepat untuk membantu teman-teman
						menemukan penyewaan sepeda dengan mudah. </p>
						<p>Berdiri sejak tahun 2020, pada masa pandemi Covid, Gowesslurr telah menyewakan
						banyak sepeda kepada pelanggan dan terus meningkatkan kualitas sepedanya. Kami Gowesslurr, jangan lupa hidup sehat
						dengan berolahraga khususnya bersepeda</p>
						<a href="{{url('about')}}" class="boxed-btn mt-4">know more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->

	{{-- Banner Promo --}}
	<div class="section-title">
		<center><h3><span class="orange-text">Our</span> Promo</h3></center>
	</div>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style = "padding: 30px">
		<div class="carousel-inner">
			@foreach($pesan as $p)
			<div class="carousel-item active">
				<img class="d-block w-100" src="{{asset('storage/'.$p->foto_pesan) }}" alt="Fourth slide">
			</div>
			@endforeach
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

	<!-- bike package section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> Bike Rent Package</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-5 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<img src="{{asset('assets/assetsCustomer/img/paket/1.png')}}" alt="">
						</div>
					</div>
				</div>
                <div class="col-lg-3 col-md-5 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<img src="{{asset('assets/assetsCustomer/img/paket/2.png')}}" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-5 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<img src="{{asset('assets/assetsCustomer/img/paket/3.png')}}" alt="">
						</div>
					</div>
				</div>
                <div class="col-lg-3 col-md-5 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<img src="{{asset('assets/assetsCustomer/img/paket/4.png')}}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end bike package section -->

	<!-- Helmet package section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> Helmet Rent Package</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-5 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<img src="{{asset('assets/assetsCustomer/img/paket/5.png')}}" alt="">
						</div>
					</div>
				</div>
                <div class="col-lg-3 col-md-5 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<img src="{{asset('assets/assetsCustomer/img/paket/6.png')}}" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-5 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<img src="{{asset('assets/assetsCustomer/img/paket/7.png')}}" alt="">
						</div>
					</div>
				</div>
                <div class="col-lg-3 col-md-5 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<img src="{{asset('assets/assetsCustomer/img/paket/8.png')}}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end bike package section -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> Bicycle</h3>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-3 col-md-5 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="{{asset('assets/assetsCustomer/img/products/fixie.jpg')}}" alt=""></a>
						</div>
						<h3>FIXIE</h3>
					</div>
				</div>
                <div class="col-lg-3 col-md-5 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="{{asset('assets/assetsCustomer/img/products/mtb.jpg')}}" alt=""></a>
						</div>
						<h3>MTB</h3>
					</div>
				</div>
				<div class="col-lg-3 col-md-5 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="{{asset('assets/assetsCustomer/img/products/roadbike.jpg')}}" alt=""></a>
						</div>
						<h3>ROAD BIKE</h3>
					</div>
				</div>
				<div class="col-lg-3 col-md-5 offset-md-3 offset-lg-0 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="{{asset('assets/assetsCustomer/img/products/seli.jpg')}}" alt=""></a>
						</div>
						<h3>SELI</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end product section -->


	{{-- Customer of the week --}}
	{{-- <div class="section-title mt-150" >
		<center><h3><span class="orange-text">Customer</span> of The Week</h3></center>
	</div>
	<div id="carouselExampleIndicators" class="carousel slide container" data-ride="carousel" style = "padding: 30px; background: black">
		<div class="carousel-inner">
			@foreach($galeri as $g)
			<div class="carousel-item active">
				<img class="d-block w-100" src="{{asset('storage/'.$g->foto) }}" style = "width : 100px !important"alt="Fourth slide">
				<div class="carousel-caption d-none d-md-block">
					<h5 style="color: white !important">{{$g->nama}}</h5>
					<p style="color: white !important">{{$g->deskripsi}}</p>
				</div>
			</div>
			@endforeach
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div> --}}

	{{-- End customer of the Week --}}


	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner d-flex justify-content-center" >
						<div class="single-logo-item">
							<img src="{{asset('assets/assetsCustomer/img/company-logos/1.jpg')}}" style = "border-radius: 50%" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{asset('assets/assetsCustomer/img/company-logos/2.jpg')}}" style = "margin-top:50px;" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

    <!-- logo carousel -->
	<div class="gallery-carousel-section">
		<div class="container">
			<div class="row">
                <div class="section-title">	
                    <h3 style = "color: #fff"><span class="orange-text">Our</span > Gallery</h3>
                </div>
				<div class="col-lg-12">
					<div class="gallery-carousel-inner d-flex justify-content-center" >
						<div class="gallery-logo-item">
                            <img src="{{asset('assets/assetsCustomer/img/ig/1.jpg')}}" alt="">
						</div>
						<div class="gallery-logo-item">
                            <img src="{{asset('assets/assetsCustomer/img/ig/2.jpg')}}" alt="">
						</div>
                        <div class="gallery-logo-item">
                            <img src="{{asset('assets/assetsCustomer/img/ig/3.jpg')}}" alt="">
						</div>
                        <div class="gallery-logo-item">
                            <img src="{{asset('assets/assetsCustomer/img/ig/4.jpg')}}" alt="">
						</div>
                        <div class="gallery-logo-item">
                            <img src="{{asset('assets/assetsCustomer/img/ig/5.jpg')}}" alt="">
						</div>
                        <div class="gallery-logo-item">
                            <img src="{{asset('assets/assetsCustomer/img/ig/6.jpg')}}" alt="">
						</div>
                        <div class="gallery-logo-item">
                            <img src="{{asset('assets/assetsCustomer/img/ig/7.jpg')}}" alt="">
						</div>
                        <div class="gallery-logo-item">
                            <img src="{{asset('assets/assetsCustomer/img/ig/8.jpg')}}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

@endsection