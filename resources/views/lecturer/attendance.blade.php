@extends('layouts.lecturer')

@section('content')
<div class="mainDiv">
    <div class="mainmain newClass">
        <section class="banner">
            <h2>{{$class->name}}</h2>
            <p><b>{{$class->target_group}}</b></p>
        </section>
        <div class="links">
            <a href="/class/{{$class->id}}">Classwork</a>
            <a href="/students/{{$class->id}}">Students</a>
            <a href="/attendance/{{$class->id}}" id="active">Attendance</a>
            <a href="/marks/{{$class->id}}">Marks</a>
            <a href="/editAttendance/{{$class->id}}" id="add">edit attendance</a>
        </div>
        <div class="attendance">
            <form action="/attendance" method="post" id="newclass" class="attend">
                @csrf
                <div class="space">
                    <div class="inpDiv">
                        <label for=""><i class="fa-solid fa-chalkboard-user"></i><b>Admission number</b></label>
                        <div class="inpDiv">
                            <select name="student_id" id="">
                                <option value="">Choose the admission number</option>
                                @foreach ($class->students as $students)
                                <option value="{{$students->id}}">{{$students->id}}</option>
                                @endforeach
                            </select>
                    
                        </div>
                    </div>
                    <div class="inpDiv">
                        <label for=""><i class="fa-regular fa-calendar"></i><b>Date</b></label>
                        <input type="date" name="Date" id="">
                        <input type="hidden" name="unit_id" value="{{$class->unit_id}}">
                    </div>
                </div>
                <div class="space">
                    <div class="inpDiv">
                        <label for=""><i class="fa-solid fa-clock"></i><b>Start Time</b></label>
                        <input type="time" name="Time" id="">
                    </div>
                    <div class="inpDiv">
                        <label for=""><i class="fa-solid fa-clock"></i><b>Attendance</b></label>
                        <div class="inpDiv">
                            <select name="Attendance" id="">
                                <option value="">select attendance</option>
                                <option value="present">Present</option>
                                <option value="absent">Absent</option>
                            </select>
                    
                        </div>
                    </div>
                </div>
                <div class="space">
                    <div class="inpDiv">
                        <label for=""><i class="fa-solid fa-laptop-file"></i><b>Duration</b></label>
                        <input type="text" name="Duration" id="" placeholder="enter duration">
                    </div>
                    <div class="inpDiv">
                        <button>add attendance</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="editAttendance">

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