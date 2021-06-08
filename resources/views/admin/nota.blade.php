<head>
	<link rel="stylesheet" type="text/css" href="{{public_path('assets/assetsAdmin/css/bootstrap/css/bootstrap.min.css')}}">
	<style>
		html{
			margin : 0;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			font-size: 12px;
	
		}
		
	</style>
</head>
<html>
	<div style = "margin-top:20px;"> 
		<center>
			<img src="{{public_path('assets/assetsAdmin/images/logo.jpg')}}" alt="" width="70px">
			<p style = "margin-top:-10px;"><b>GOWESLURR</b></p>
			<p>Jln. Kesatria E2</p>
			<p>instagram.com/gowesslurr_malang</p>
		</center>
	</div>
	<hr style = "color: rgb(172, 172, 172) !important">
	<div class="penyewaanDetail">
		<center><p>{{$penyewaan->user->username}}</p></center>
		<center>
			<p style="margin-top: -10px">{{$penyewaan->user->no_telp}}</p>
		</center>
	</div>
	<div>
		<center>
			<p>Invoice# {{$penyewaan->no_nota}}</p>
			<p>Date {{$convertToString}}</p>
		</center>
	</div>

	<table class = "table table-stripped">
		<thead>
			<tr>
				<th>Metode</th>
				<th>P#</th>
				<th>U#</th>
				<th>Nominal</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				@if($penyewaan->no_nota === $pembayaran->nota_no)
				<td>
					@if($pembayaran->metode)
					Cash
					@else
					Transfer
					@endif
				</td>
				<td>{{$countGroupPaket}}</td>
				<td>{{$countGroupSepeda}}</td>
				<td>{{$pembayaran->nominal}}</td>
				@endif
			</tr>
		</tbody>
	</table>

	<table class="table table-stripped">
		<thead>
			<tr>
				<th>Paket</th>
				<th>Unit Code</th>
				<th style = "text-align:end;">Harga</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($detailPenyewaan as $detailPenyewaan)
			@if($penyewaan->no_nota === $detailPenyewaan->nota_no)
			<tr>
			<td>{{$detailPenyewaan->paket->nama_paket}}</td>
			<td>{{$detailPenyewaan->sepeda->unit_code}}</td>
			<td>{{$detailPenyewaan->paket->harga}}</td>
			</tr>
		@endif
		@endforeach
		</tbody>
	</table>
	<hr>

	<div style="align-items: flex-end !important; justify-content: flex-end !important; padding: 10px 0px;padding-left: 100px; border-top: 1px solid black; border-bottom: 1px solid rgb(182, 182, 182)" >
		<div>
		<table>
			<tbody>
			<tr>
				<td>SubTotal</td>
				<td>: Rp {{$total}}</td>
			</tr>
			<tr >
				<td><b> GrandTotal</b></td>
				<td><b>: Rp {{$total}} </b></td>
			</tr>
			<tr>
				<td><b> Kembalian</td>
				<td><b>: Rp {{$kembalian}} </b></td>
			</tr>
			</tbody>
		</table>
			</div>
	</div>
	
	<div class = "mt-3">
		<center>
			<p style="color:rgb(165, 164, 164)">Terima Kasih. Silakan Berbelanja Kembali.</p>
		</center>
	</div>



	<div class="sepedaDetail">
		{{-- @foreach ($detailPenyewaan as $detailPenyewaan)
		@if($penyewaan->no_nota === $detailPenyewaan->nota_no)
		<li>{{$detailPenyewaan->sepeda->unit_code}} - {{$detailPenyewaan->paket->nama_paket}} -
			{{$detailPenyewaan->paket->harga}}</li>
		@endif
		@endforeach --}}


	</div>
	
</html>