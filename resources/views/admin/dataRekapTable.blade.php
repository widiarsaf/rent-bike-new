<table class="table table-hover" id="tabelDataRekap">
    <thead>
        <tr>
            <th>No Nota</th>
            <th>Sepeda</th>
            <th>Paket</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datas as $dp) <tr>
            <th style="background: rgb(244, 252, 226)">{{$dp->nota_no}}</th>
            <td>{{$dp->sepeda->unit_code}}</td>
            <td>{{$dp->paket->nama_paket}}</td>
            <td>{{$dp->tanggal}}</td>
        </tr>
        @endforeach
    </tbody>
</table>