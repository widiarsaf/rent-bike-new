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
</div>
<div class="page-body">
    <div class="card">
        <div class="card-header">
            <h5>Tabel Paket Penyewaan</h5>
            <span>Daftar Paket Penyewaan Yang disediakan</span>
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
            <div class="d-flex" style="align-items:flex-end; justify-content:space-between">
                <form action="">
                    <div class="header d-flex col-md-9" style="align-items: flex-end;">
                        <div class="form mr-2">
                            <label for="">Masukkan Tanggal Awal</label>
                            <input type="date" class="form-control" id="reservation_time"
                                placeholder="Masukkan tanggal awal" name="reservation_time">
                        </div>
                        <div class="form">
                            <label for="">Masukkan Tanggal Awal</label>
                            <input type="date" class="form-control" id="reservation_time"
                                placeholder="Masukkan tanggal akhir" name="reservation_time">
                        </div>
                        <button class="btn btn-info ml-3" style="height: 50%; align-items:center">Filter</button>
                    </div>
                </form>

                <form action="">
                    <button class="btn btn-primary">Print To Excel</button>
                </form>
            </div>


            {{-- Tabel --}}
            <div class=" table-responsive mt-4" style="display : block;" id="penyewaanTable">
                <table class="table table-hover" id="tabelDataRekap">
                    <thead>
                        <tr>
                            <th>No Nota</th>
                            <th>Sepeda</th>
                            <th>Paket</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detailpenyewaan as $dp) <tr>

                            <th style="background: rgb(244, 252, 226)">{{$dp->nota_no}}</th>
                            <td>{{$dp->sepeda->unit_code}}</td>
                            <td>{{$dp->paket->nama_paket}}</td>
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
    function showFormAddSepeda(){
        console.log('OK')
        var formAdd = document.getElementById('formAddSepeda');
        var sepedaTable = document.getElementById('sepedaTable');
        var search = document.getElementById('search');
        if (formAdd.style.display === "none") {
            formAdd.style.display = "";
            sepedaTable.style.display = "none";
            search.style.opacity= "0";
        } else {
            formAdd.style.display = "none";
            sepedaTable.style.display = "block";
            search.style.opacity = "1";
        }
    }

</script>

@endsection