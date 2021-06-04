@extends('layouts.admin')
@section('content')


<div class="page-body">
    <div class="card p-3">
        <div class="" style=" display : flex; justify-content: space-evenly; flex-wrap:wrap">
            <div class="calendarContainer px-3" style="width : 50%; height: 100%">
                <div id="calendar" class="mt-4"></div>
                <form action="{{route('calendar.index')}}" style="display:none" id="formDate">
                    <input type="date" id="selectDate" name="tanggal">
                </form>
            </div>
            <div class="penyewaanContainer"
                style="border-left: 1px solid rgb(221, 221, 221); width : 50%; padding: 10px">
                <h5><b style="color: #00aced"> Penyewaan Tanggal  {{$selectDate}}</b>
                </h5>
                <div class="table-responsive">
                    <table class="table table-hover" style="margin-top: 10px;">
                        <thead>
                            <tr>
                                <th>no nota</th>
                                <th>Username</th>
                                <th>tanggal</th>
                                <th>total biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penyewaan as $p)
                            <tr>
                                <td>{{$p->no_nota}}</td>
                                <th>{{$p->user->username}}</th>
                                <td>{{$p->tanggal}}</td>
                                <td>{{$p->total_biaya}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

