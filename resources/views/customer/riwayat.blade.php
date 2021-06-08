@extends('layouts.customer')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<h1>Riwayat Penyewaan</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<div class="latest-news mt-150 mb-150">
	<div class="section-title text-center">
		<center><h3>Riwayat <span class="orange-text">Penyewaan</span></h3></center>
	</div>
	<div class="container">
		<div class="row">
			{{-- Card --}}
			@foreach($penyewaan as $p)
			<div class="col-lg-4 col-md-6">
				<div class="single-latest-news">
					<div class="news-text-box">
						<h3><a href="single-news.html">No Nota: {{$p->no_nota}}</a></h3>
						<p class="blog-meta">
							<span class="author"><i class="fas fa-user"></i> {{$p->user->nama}}</span>
						</p>
						<p class="blog-meta">
							<span class="date"><i class="fas fa-calendar"></i>Penyewaan tanggal: {{$p->tanggal}} {{$p->jam}}</span>
						</p>
						<h4 class="excerpt"><b>Rp. {{$p->total_biaya}} </b></h4>
						<a href="{{route('penyewaanCustomerDetail', $p->id_penyewaan)}}" class="read-more-btn">Lihat Detail <i class="fas fa-angle-right"></i></a>
					</div>
				</div>
			</div>
			@endforeach
			
		</div>
	</div>
</div>
<!-- end latest news -->


@endsection