@extends('layouts.customer')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Get close with Us</p>
					<h1>About Us</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="sephp artisan servearch-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search arewa -->

	<!-- featured section -->
	<div class="feature-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="featured-text">
						<h2 class="pb-3">GOWESSLURR <span class="orange-text">MALANG</span></h2>
						<div class="row">
							<div class="col-lg-12">
								<div class="contact-form-wrap">
									<div class="contact-form-box">
										<h4><i class="fas fa-map"></i> Address</h4>
										<p style="font-size: 16px !important">Goweslurr malang
										Jl. Terusan Kesatrian No.Dalam, Kesatrian, Kec. Blimbing, Kota Malang, Jawa Timur 65126</p>
									</div>
									<div class="contact-form-box">
										<h4><i class="far fa-clock"></i> Rent Hours</h4>
										<p style="font-size: 16px !important">SUNDAY-SATURDAT: 7 to 8 PM <br> WEDNESDAY : <b> CLOSED! </b></p>
										<p></p>
									</div>
									<div class="contact-form-box">
										<h4><i class="fas fa-address-book"></i> Contact</h4>
										<p style="font-size: 16px !important">Phone (WA): 0812-3323-5758 <br> Instagram: <a target = "_blank"href="https://www.instagram.com/goweslurr_malang/">goweslurr_malang</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end featured section -->

	<!-- team section -->
	<div class="mt-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3>Our <span class="orange-text">Team</span></h3>
					</div>
				</div>
			</div>
			<div class="row" style="justify-content:center">
				<div class="col-lg-4 col-md-4">
					<div class="single-team-item">
						<div class="team-bg team-bg-1"></div>
						<h4>Yusuf Pandhu Wijaya <span>Admin 1</span></h4>
						<ul class="social-link-team">
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="single-team-item">
						<div class="team-bg team-bg-2"></div>
						<h4>Tunas Timur<span>Admin 2</span></h4>
						<ul class="social-link-team">
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end team section -->

	<!-- maps section -->
	<div class = "mt-150">
	<!-- find our location -->
		<div class="find-location blue-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
					</div>
				</div>
			</div>
		</div>
		<!-- end find our location -->
		
		<!-- google map section -->
		<div class="embed-responsive embed-responsive-21by9">
			<iframe
				src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15804.797970538884!2d112.6429091!3d-7.9783217!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2e42001be9d62c6e!2sGoweslurr%20malang!5e0!3m2!1sen!2sid!4v1623075144737!5m2!1sen!2sid"
				width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
				class="embed-responsive-item"></iframe>
		</div>
	</div>
	<!-- end google map section -->
	<!-- end maps section -->

@endsection