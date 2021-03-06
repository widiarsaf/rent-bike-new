@extends('layouts.admin')

@section('content')
<div>
    @if ($message = Session::get('fail'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Failed!!</strong><span> {{ $message }}</span>
    </div>
    @elseif ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!!</strong><span> {{ $message }}</span>
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<div class="page-body">
    <div class="card">
        <div class="card-header">
            <h5>Tabel Data Penyewaan</h5>
            <span>Daftar Data Penyewaan yang Terdaftar</span>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><i class="icofont icofont-simple-left "></i></li>
                    <li><i class="icofont icofont-maximize full-card"></i></li>
                    <li><i class="icofont icofont-minus minimize-card"></i></li>
                    <li><i class="icofont icofont-refresh reload-card"></i></li>
                    <li><i class="icofont icofont-error close-card"></i></li>
                </ul>
            </div>
        </div>
        <div class="card-block table-border-style">
            <div id="header-content">
                <div class="d-flex mb-4" style="justify-content :space-between">
                    <button class="btn btn-primary ml-3" onclick="showFormAddPenyewaan(); return false;">
                        <i class="ti-plus"></i>
                        Tambah Data
                    </button>
                </div>
            </div>
            {{-- Form Add Data --}}
            <div class="mx-3 mb-3" style="display:none;" id="formAddPenyewaan">
                <h4 class=" mb-3">Masukkan Data Penyewaan Baru</h4>
                <form method="post" action="{{ route('penyewaan.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="unit_code">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Masukkan username"
                            name="username">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" placeholder="Masukkan tanggal"
                            name="tanggal">
                    </div>
                    <div class="form-group">
                        <label for="jam">Jam</label>
                        <input type="time" class="form-control" id="jam" placeholder="Masukkan jam" name="jam">
                    </div>
                    @php $noPaket = 1; @endphp
                    @foreach($paket as $p)
                    <div class="form-group">
                        <label for="jam">{{$p->nama_paket}}</label>
                        {{-- <input type="checkbox" value = "{{$p->id_paket}}" id = "paketInput{{$p->id_paket}}" name="paket_id[]"> --}}
                        <div class="form-control">
                            @foreach($sepeda as $s)
                            <input type="checkbox" onchange = "$('#paketInput{{$p->id_paket}}').checked = true;" 
                            id="sepeda{{$s->id_sepeda}}{{$p->id_paket}}" 
                            name="sepeda_id[][{{$p->id_paket}}]" value = {{$s->id_sepeda}}>
                            <label for="service{{$s->id_sepeda}}">{{$s->unit_code}}</label>
                            @endforeach
                        </div>
                    </div>
                    <p style = "display:none">{{$noPaket++}}></p>
                   @endforeach
                    <a type="button" id="close" class="btn btn-primary btn-outline-primary"
                        onclick="hideForm()">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            {{-- Tabel --}}
            <div class=" table-responsive" style="display : block;" id="penyewaanTable">
                <table class="table table-hover" id="tabelPenyewaan">
                    <thead>
                        <tr>
                            <th>No Nota</th>
                            <th>Username</th>
                            <th>Total Harga</th>
                            <th>Tanggal Sewa</th>
                            <th>Jam Sewa</th>
                            <th>Status Pembayaran</th>
                            <th>Status Pengembalian</th>
                            <th>Status Jaminan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penyewaan as $p) <tr>
                            <th style="background: rgb(244, 252, 226)">{{$p->no_nota}}</th>
                            <td>{{$p->user->username}}</td>
                            <td>{{$p->total_biaya}}</td>
                            <td>{{$p->tanggal}}</td>
                            <td>{{$p->jam}}</td>


                            <td>
                                <div id="pembayaran{{$p->id_penyewaan}}"
                                    style="justify-content: space-between; display:flex">
                                    <center>
                                        @if($p->status_pembayaran == 0)
                                        <div
                                            style="background-color: rgb(233, 76, 76) !important; color:rgb(241, 241, 241); border-radius:5px; padding: 5px; min-width: 100px">
                                            Belum
                                            Lunas</div>
                                        @elseif($p->status_pembayaran == 1)
                                        <div
                                            style="background-color: rgb(231, 183, 79) !important; color:rgb(241, 241, 241); border-radius:5px; padding: 5px; min-width: 100px">
                                            DP</div>
                                        @else
                                        <div
                                            style="background-color: rgb(69, 206, 51) !important; color:rgb(241, 241, 241); border-radius:5px; padding: 5px; min-width: 100px">
                                            Lunas</div>
                                        @endif
                                    </center>
                                    <a type="button" class="btn" href=""
                                        onclick="$('#editPembayaran{{$p->id_penyewaan}}').show(); $('#pembayaran{{$p->id_penyewaan}}').hide(); return false; ">
                                        <i class="ti-marker-alt"></i></a>
                                </div>
                                <form id="editPembayaran{{$p->id_penyewaan}}"
                                    action="{{route('penyewaan.updateStatus', $p->id_penyewaan)}}"
                                    style="display: none">
                                    <select name="pembayaran">
                                        <option value="0">Belum Lunas</option>
                                        <option value="1">DP</option>
                                        <option value="2">Lunas</option>
                                    </select>
                                    <button class="btn btn-sm btn-primary">done</button>
                                    <a type="button" class="btn" href=""
                                        onclick="$('#editPembayaran{{$p->id_penyewaan}}').hide(); $('#pembayaran{{$p->id_penyewaan}}').show(); return false; ">&times;</a>
                                </form>
                            </td>
                            <td>
                                <div id="pengembalian{{$p->id_penyewaan}}"
                                    style="justify-content: space-between; display:flex">
                                    <center>
                                        @if($p->status_pengembalian == 0)
                                        <div
                                            style="background-color: rgb(233, 76, 76) !important; color:rgb(241, 241, 241); border-radius:5px; padding: 5px; min-width: 100px">
                                            Belum</div>
                                        @else
                                        <div
                                            style="background-color: rgb(69, 206, 51) !important; color:rgb(241, 241, 241); border-radius:5px; padding: 5px; min-width: 100px">
                                            Sudah</div>
                                        @endif
                                    </center>
                                    <a type="button" class="btn" href=""
                                        onclick="$('#editPengembalian{{$p->id_penyewaan}}').show(); $('#pengembalian{{$p->id_penyewaan}}').hide(); return false; ">
                                        <i class="ti-marker-alt"></i></a>
                                </div>
                                <form id="editPengembalian{{$p->id_penyewaan}}"
                                    action="{{route('penyewaan.updateStatus', $p->id_penyewaan)}}"
                                    style="display: none">
                                    <select name="pengembalian">
                                        <option value="0">Belum</option>
                                        <option value="1">Sudah</option>
                                    </select>
                                    <button class="btn btn-sm btn-primary">done</button>
                                    <a type="button" class="btn" href=""
                                        onclick="$('#editPengembalian{{$p->id_penyewaan}}').hide(); $('#pengembalian{{$p->id_penyewaan}}').show(); return false; ">&times;</a>
                                </form>
                            </td>
                            <td>
                                <div id="jaminan{{$p->id_penyewaan}}"
                                    style="justify-content: space-between; display:flex">
                                    <center>
                                        @if($p->status_jaminan == 0)
                                        <div
                                            style="background-color: rgb(233, 76, 76) !important; color:rgb(241, 241, 241); border-radius:5px; padding: 5px; min-width: 100px">
                                            Belum</div>
                                        @else
                                        <div
                                            style="background-color: rgb(69, 206, 51) !important; color:rgb(241, 241, 241); border-radius:5px; padding: 5px; min-width: 100px">
                                            Sudah</div>
                                        @endif
                                    </center>
                                    <a type="button" class="btn" href=""
                                        onclick="$('#editJaminan{{$p->id_penyewaan}}').show(); $('#jaminan{{$p->id_penyewaan}}').hide(); return false; ">
                                        <i class="ti-marker-alt"></i></a>
                                </div>
                                <form id="editJaminan{{$p->id_penyewaan}}"
                                    action="{{route('penyewaan.updateStatus', $p->id_penyewaan)}}"
                                    style="display: none">
                                    <select name="jaminan">
                                        <option value="0">Belum</option>
                                        <option value="1">Sudah</option>
                                    </select>
                                    <button class="btn btn-sm btn-primary">done</button>
                                    <a type="button" class="btn" href=""
                                        onclick="$('#editJaminan{{$p->id_penyewaan}}').hide(); $('#jaminan{{$p->id_penyewaan}}').show(); return false; ">&times;</a>
                                </form>
                            </td>
                            <td style="display: flex">
                                <form style="margin-left: 5px"
                                    action="{{ route('penyewaan.destroy', $p->id_penyewaan) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-warning" href="{{route('penyewaan.edit', $p->id_penyewaan)}}" onclick="" ><i class="ti-marker-alt"></i></a>
                                    <button type="submit" class="btn btn-danger"><i class="ti-trash"></i></button>
                                    <a class="btn btn-inverse" href="{{route('penyewaan.show', $p->id_penyewaan)}}"
                                        onclick="" style="color:white" data-original-title="lihat detail"><i
                                            class="ti-zoom-in"></i>Lihat Detail</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Basic table card end -->
</div>


<script>
    function showFormAddPenyewaan(){
        console.log('OK')
        var formAdd = document.getElementById('formAddPenyewaan');
        var penyewaanTable = document.getElementById('penyewaanTable');
        var header = document.getElementById('header-content');
        if (formAdd.style.display === "none") {
            formAdd.style.display = "";
           penyewaanTable.style.display = "none";
            header.style.display ="none";
        } else {
            formAdd.style.display = "none";
            sepedaTable.style.display = "";
            header.style.display ="block";
        }
    }
    
    function hideForm()
    {
        console.log('OK')
        var formAdd = document.getElementById('formAddPenyewaan');
        var penyewaanTable = document.getElementById('penyewaanTable');
        var header = document.getElementById('header-content');
        if (formAdd.style.display === "") {
            formAdd.style.display = "none";
            penyewaanTable.style.display = "";
            header.style.display= "";
     }
    }
</script>
@endsection