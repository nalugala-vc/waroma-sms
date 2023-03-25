@extends('layouts.mainDis')

@section('content')
<div class="serch">
    <input type="text" name="" id="" placeholder="search here">
    <button><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
<div class="backGroundChange">
    <h2 id="attend">My Attendance</h2>
    <div class="myattendance">
        <div class="tiles">
            @forelse ($student->units as $unit)
            <div class="tile bounce">
                <div class="sepDets">
                    <div class="attendImg">
                        <img src="/images/global (1).png" alt="" id="">
                    </div>
                    <div class="info">
                        <h2></h2>
                        <p>{{$unit->name}}</p>
                    </div>
                </div>
                <div id="details">
                    <a href="/viewAttendance/{{$unit->id}}">see details</a>
                </div>
            </div>
            @empty
            <div class="emptAtt">
                <img src="/images/searching.png" alt="">
                <h4>Opps You do not have any registered units</h4>
            </div>

            @endforelse
            
        </div>
    </div>
</div>
@endsection