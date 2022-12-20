@extends('layouts.lecturer')

@section('content')
<div class="mainDiv">
    <div class="mainmain newClass">
        <section class="banner">
            <h2>{{$class->name}}</h2>
            <p><b>{{$class->target_group}}</b></p>
        </section>
        <div class="links">
            <a href="/class/{{$class->id}}/{{$lecturer->id}}">Classwork</a>
            <a href="/students/{{$class->id}}/{{$lecturer->id}}" id="active">Students</a>
            <a href="/attendance/{{$class->id}}/{{$lecturer->id}}" >Attendance</a>
            <a href="/marks/{{$class->id}}/{{$lecturer->id}}">Marks</a>
        </div>
        <div class="classwork">
            <div class="studentsTable">
                <table>
                    <tr>
                        <th>picture</th>
                        <th>id</th>
                        <th>name</th>
                        <th>Attendance</th>
                        <th>AVG. marks</th>
                    </tr>
                    @forelse ($class->students as $students)
                    <tr>
                        <td><img src="/images/person.jpg" alt=""></td>
                        <td>{{$students->id}}</td>
                        <td>{{$students->name}}</td>
                        <td>23%</td>
                        <td class="venue">79%</td>
                    </tr>
                    @empty

                    @endforelse
                </table>
            </div>
        </div>
    </div>
    <div class="sidemain">
        <div class="clender">
            <iframe src="https://calendar.google.com/calendar/embed?height=300&wkst=1&bgcolor=%237986CB&ctz=Africa%2FNairobi" style="border-width:0" width="250" height="250" frameborder="0" scrolling="no"></iframe>
        </div>
        <div class="notifications">
            <div class="nhead">
                <h3>Upcoming Classes</h3>
            </div>
            <div id="notify">
                @for ($i=0;$i < count($schedule); $i++)
                <div class="notif1">
                    <div class="upClass">
                        <span><b>{{$UnitNames[$i]}}</b></span>
                        <span><p>{{$CourseNames[$i]}}</p></span>
                    </div>
                    <div class="time">
                        <span><b>{{$start_time[$i]}}</b></span>
                    </div>
                </div>
                @endfor

                @if (count($schedule) == 0)
                <div class="noschedule">
                    <img src="/images/happy.png" alt="">
                    <h3>No classes for you today</h3>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection