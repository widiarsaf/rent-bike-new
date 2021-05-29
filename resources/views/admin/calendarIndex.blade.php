@extends('layouts.admin')
@section('content')

<div class="page-body">
    <div class="card">
        <div id="calendar"></div>

    </div>
    <form action="{{route('calendar.index')}}" style="display:none" id="formDate">
        <input type="date" id="selectDate" name="tanggal">
    </form>

    <table>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>no nota</th>
                    <th>tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penyewaan as $p)
                <tr>
                    <td>{{$p->no_nota}}</td>
                    <td>{{$p->tanggal}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </table>
</div>


@endsection