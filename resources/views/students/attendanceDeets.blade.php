@extends('layouts.mainDis')

@section('content')
<div class="serch">
    <input type="text" name="" id="" placeholder="search here">
    <button><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
<div class="backGroundChange att">
    <h2 id="attendd">{{$unit->name}}</h2>
    <div class="schedule">
        <table>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Duration</th>
                <th>Attendance</th>
            </tr>
            @forelse ($attendance as $studentAttendance)
            <tr>
                <td>{{$studentAttendance->Date}}</td>
                <td>{{$studentAttendance->Time}}</td>
                <td>{{$studentAttendance->Duration}}</td>
                <td class="venue">{{$studentAttendance->Attendance}}</td>
            </tr>
            @empty
            <tr>
                <td>your attendance</td>
                <td>for this unit</td>
                <td>has not been</td>
                <td>recorded yet</td>
            </tr>
            @endforelse
        </table>
    </div>
   
</div>
@endsection