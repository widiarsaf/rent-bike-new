<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Gowesslurr Malang</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="{{asset('assets/assetsCustomer/img/favicon-gws.png')}}">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="{{asset('assets/assetsCustomer/css/all.min.css')}}">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{asset('assets/assetsCustomer/css/bootstrap.min.css')}}">
	<!-- owl carousel -->
	<link rel="stylesheet" href="{{asset('assets/assetsCustomer/css/owl.carousel.css')}}">
	<!-- magnific popup -->
	<link rel="stylesheet" href="{{asset('assets/assetsCustomer/css/magnific-popup.css')}}">
	<!-- animate css -->
	<link rel="stylesheet" href="{{asset('assets/assetsCustomer/css/animate.css')}}">
	<!-- mean menu css -->
	<link rel="stylesheet" href="{{asset('assets/assetsCustomer/css/meanmenu.min.css')}}">
	<!-- main style -->
	<link rel="stylesheet" href="{{asset('assets/assetsCustomer/css/main.css')}}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('assets/assetsCustomer/css/responsive.css')}}">

</head>

<body>


	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="{{asset('assets/assetsCustomer/img/logo-remove.png')}}" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li><a href="{{url('home')}}">Home</a></li>
								<li><a href="{{url('about')}}">About</a></li>
								<li><a href="{{route('sepedaCustomer')}}">Katalog</a></li>
								<li>
									@guest
									@if(Route::has('login'))
								
									@endif
									
									@if (Route::has('Register'))
								
									@endif
									
									@else
									<a href="{{route('penyewaanCustomer', Auth::user()->id_pengguna)}}">Riwayat Penyewaan</a>
									@endguest
								</li>
								<li>
									<div class="header-icons">
										@guest
										@if(Route::has('login'))
											<a href="{{route('login')}}">Login</a>
										@endif
									
										@if (Route::has('Register'))
											<a href="{{route('login')}}">Login</a>
										@endif
									
										@else
										
										<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
											<i class="ti-layout-sidebar-left"></i> Logout
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
										@endguest


									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-shopping-cart"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	@yield('content')


	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>Gowesslurr Malang Rent Bike adalah tempat penyewaan sepeda berlokasi di Jl. Terusan Kesatrian E2, Kota Malang Dekat Rampal, dengan sepeda trendy dan nyaman.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>Goweslurr malang Jl. Terusan Kesatrian No.Dalam, Kesatrian, Kec. Blimbing, Kota Malang, Jawa Timur 65126</li>
							<li><a target="_blank" href="https://www.instagram.com/goweslurr_malang/">goweslurr_malang </a></li>
							<li>0812-3323-5758</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="{{url('home')}}">Home</a></li>
							<li><a href="{{url('about')}}">About</a></li>
							<li><a href="{{route('sepedaCustomer')}}">Katalog</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->

	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2021 - Gowesslurr Malang, All Rights
						Reserved.</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="https://www.instagram.com/goweslurr_malang/" target="_blank"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->

	<!-- jquery -->
	<script src="{{asset('assets/assetsCustomer/js/jquery-1.11.3.min.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{asset('assets/assetsCustomer/js/bootstrap.min.js')}}"></script>
	<!-- count down -->
	<script src="{{asset('assets/assetsCustomer/js/jquery.countdown.js')}}"></script>
	<!-- isotope -->
	<script src="{{asset('assets/assetsCustomer/js/jquery.isotope-3.0.6.min.js')}}"></script>
	<!-- waypoints -->
	<script src="{{asset('assets/assetsCustomer/js/waypoints.js')}}"></script>
	<!-- owl carousel -->
	<script src="{{asset('assets/assetsCustomer/js/owl.carousel.min.js')}}"></script>
	<!-- magnific popup -->
	<script src="{{asset('assets/assetsCustomer/js/jquery.magnific-popup.min.js')}}"></script>
	<!-- mean menu -->
	<script src="{{asset('assets/assetsCustomer/js/jquery.meanmenu.min.js')}}"></script>
	<!-- sticker js -->
	<script src="{{asset('assets/assetsCustomer/js/sticker.js')}}"></script>
	<!-- main js -->
	<script src="{{asset('assets/assetsCustomer/js/main.js')}}"></script>

</body>

</html>