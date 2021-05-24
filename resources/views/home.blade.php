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
								<a href="shop.html" class="boxed-btn">Bike Collection</a>
								<a href="contact.html" class="bordered-btn">About Us</a>
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
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Free Shipping</h3>
							<p>When order over $75</p>
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
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Refund</h3>
							<p>Get refund within 3 days!</p>
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
						<p>Etiam vulputate ut augue vel sodales. In sollicitudin neque et massa porttitor vestibulum ac vel nisi. Vestibulum placerat eget dolor sit amet posuere. In ut dolor aliquet, aliquet sapien sed, interdum velit. Nam eu molestie lorem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente facilis illo repellat veritatis minus, et labore minima mollitia qui ducimus.</p>
						<a href="about.html" class="boxed-btn mt-4">know more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> Bicycle</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
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
                            <img src="{{asset('assets/assetsCustomer/img/gallery/byc.jpg')}}" alt="">
                            <a href="#"><i class="ti-instagram"></i></a>
						</div>
						<div class="gallery-logo-item">
                            <img src="{{asset('assets/assetsCustomer/img/gallery/byc.jpg')}}" alt="">
                            <a href="#"><i class="ti-instagram"></i></a>
						</div>
                        <div class="gallery-logo-item">
                            <img src="{{asset('assets/assetsCustomer/img/gallery/byc.jpg')}}" alt="">
                            <a href="#"><i class="ti-instagram"></i></a>
						</div>
                        <div class="gallery-logo-item">
                            <img src="{{asset('assets/assetsCustomer/img/gallery/byc.jpg')}}" alt="">
                            <a href="#"><i class="ti-instagram"></i></a>
						</div>
                        <div class="gallery-logo-item">
                            <img src="{{asset('assets/assetsCustomer/img/gallery/byc.jpg')}}" alt="">
                            <a href="#"><i class="ti-instagram"></i></a>
						</div>
                        <div class="gallery-logo-item">
                            <img src="{{asset('assets/assetsCustomer/img/gallery/byc.jpg')}}" alt="">
                            <a href="#"><i class="ti-instagram"></i></a>
						</div>
                        <div class="gallery-logo-item">
                            <img src="{{asset('assets/assetsCustomer/img/gallery/byc.jpg')}}" alt="">
                            <a href="#"><i class="ti-instagram"></i></a>
						</div>
                        <div class="gallery-logo-item">
                            <img src="{{asset('assets/assetsCustomer/img/gallery/byc.jpg')}}" alt="">
                            <a href="#"><i class="ti-instagram"></i></a>
						</div>
                        <div class="gallery-logo-item">
                            <img src="{{asset('assets/assetsCustomer/img/gallery/byc.jpg')}}" alt="">
                            <a href="#"><i class="ti-instagram"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

@endsection