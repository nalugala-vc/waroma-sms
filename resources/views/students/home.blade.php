@extends('layouts.mainDis')

@section('content')
<div class="serch">
    <input type="text" name="" id="" placeholder="search here">
    <button><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
<div class="backGroundChange">
    <div class="mainContToo">
        <h2>My Classes</h2>
        <div id="cards">
                @forelse($student->classes as $class)
                <div class="card bounce">
                    <a href="/studentClass/{{$student->id}}/{{$class->id}}">
                        <div class="img">
                            <img src="/images/notetakingg.png" alt="" id="svgStudents">
                        </div>
                        <div class="infoCards">
                            <div>
                                <h4>{{$class->lecturer->name}}</h4>
                                <p>{{$class->name}}</p>
                            </div>
                        </div>
                    </a>
                </div>
                 @empty
                 <div class="empty">
                    <div id="empty">
                        <img src="/images/searching.png" alt="">
                        <h3>Opss you have not enrolled to any classes</h3>
                    </div>
                    <div class="enroltoclass">
                        <a href="">EnrollToClass</a>
                    </div>
                 </div>
                 @endforelse
           
        </div>
    </div>
    <div class="schedule table">
        <h2>My Schedule</h2>
        <table>
            <tr>
                <th>Lesson</th>
                <th>Start</th>
                <th>End</th>
                <th>Lecturer</th>
                <th>Venue</th>
            </tr>
            @forelse ($student->schedule as $schedule)
            <tr>
                <td>{{$schedule->unit->name}}</td>
                <td>{{$schedule->start_time}}</td>
                <td>{{$schedule->end_time}}</td>
                <td>{{$schedule->lecturer->name}}</td>
                <td class="venue">{{$schedule->equipments}}</td>
            </tr>
           @empty
                <tr>
                    <td>You</td>
                    <td>Dont</td>
                    <td>have any</td>
                    <td>classes</td>
                    <td class="venue">TODAY</td>
                </tr>
            @endforelse
        </table>
    </div>
</div>
@endsection
