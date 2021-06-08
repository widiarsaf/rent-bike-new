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

{{-- Riwayat --}}
<div>
	@foreach($penyewaan as $p)
	<div class="card">
		<h2>No nota <b>{{$p->no_nota}}</b></h2>
		<p>Tanggal Sewa<b>{{$p->tanggal}}</b></p>
		<p>Jam Sewa <b>{{$p->jam}}</b></p>
		<p>Total Biaya <b>{{$p->total_biaya}}</b></p>
	</div>
	@endforeach
</div>

@endsection