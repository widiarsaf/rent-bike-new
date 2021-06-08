@extends('layouts.admin')
@section('content')
<div class="page-body">
	<div class="card">
		<div class="collapse mx-3 mb-3" style="display:block" id="formEditPembayaran">
			<h4 class=" mb-3">Edit Penyewaan</h4>
				<form method="post" action="{{ route('penyewaan.update', $penyewaan->id_penyewaan) }}" id="myForm" enctype="multipart/form-data">
					{{method_field('PUT')}}
					{{csrf_field()}}
					<div class="form-group">
						<h5>No Nota : <b>{{$penyewaan->no_nota}}</b></h5>
					</div>
					<input type="hidden" name="no_nota" id="no_nota" value = "{{$penyewaan->no_nota}}">
					<div class="form-group">
						<label for="unit_code">Username</label>
						<input type="text" class="form-control" id="username" placeholder="Masukkan username" name="username" value = "{{$penyewaan->user->username}}">
					</div>
					<div class="form-group">
						<label for="tanggal">Tanggal</label>
						<input type="date" class="form-control" id="tanggal" placeholder="Masukkan tanggal" name="tanggal" value = "{{$penyewaan->tanggal}}">
					</div>
					<div class="form-group">
						<label for="jam">Jam</label>
						<input type="time" class="form-control" id="jam" placeholder="Masukkan jam" name="jam" value = "{{$penyewaan->jam}}">
					</div>
					@php $noPaket = 1; @endphp
					@foreach($paket as $p)
					<div class="form-group">
						<label for="jam">{{$p->nama_paket}}</label>
						{{-- <input type="checkbox" value = "{{$p->id_paket}}" id = "paketInput{{$p->id_paket}}" name="paket_id[]"> --}}
						<div class="form-control">
							@foreach($sepeda as $s)
							<input type="checkbox" onchange="$('#paketInput{{$p->id_paket}}').checked = true;"
								id="sepeda{{$s->id_sepeda}}{{$p->id_paket}}" name="sepeda_id[][{{$p->id_paket}}]" value={{$s->id_sepeda}}>
							<label for="service{{$s->id_sepeda}}">{{$s->unit_code}}</label>
							@endforeach
						</div>
					</div>
					<p style="display:none">{{$noPaket++}}></p>
					@endforeach
					<a type="button" class="btn btn-primary btn-outline-primary" href="{{route('penyewaan.index')}}">back</a>
					<button type="submit" class="btn btn-primary">Edit</button>
				</form>
		</div>
	</div>
</div>

@endsection