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
            <a href="/students/{{$class->id}}/{{$lecturer->id}}">Students</a>
            <a href="/attendance/{{$class->id}}/{{$lecturer->id}}">Attendance</a>
            <a href="/marks/{{$class->id}}/{{$lecturer->id}}" id="active">Marks</a>
            <a href="/marksEdit/{{$class->id}}/{{$lecturer->id}}" id="add">edit marks</a>
        </div>
        <div class="attendance">
            <form action="/marks" method="post" id="newclass" class="attend">
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
                        <label for=""><i class="fa-regular fa-calendar"></i><b>Name of exam</b></label>
                        <input type="text" name="name" id="" placeholder="enter name of exam">
                    </div>
                </div>
                <div class="space">
                    <div class="inpDiv">
                        <label for=""><i class="fa-solid fa-file-circle-check"></i><b>Max marks</b></label>
                        <input type="number" name="Max_marks" id="" placeholder="enter the maximum marks">
                    </div>
                    <div class="inpDiv">
                        <label for=""><i class="fa-solid fa-file-circle-question"></i><b>Student marks</b></label>
                        <div class="inpDiv">
                            <input type="number" name="student_marks" id="" placeholder="enter students marks">
                        </div>
                    </div>
                </div>
                <div class="space">
                    <div class="inpDiv">
                        <label for=""><i class="fa-solid fa-laptop-file"></i><b>weight</b></label>
                        <input type="hidden" name="unit_id" value="{{$class->unit_id}}">
                        <input type="hidden" name="class_id" value="{{$class->id}}">
                        <input type="number" name="weight" id="" placeholder="enter weight out of 100">
                    </div>
                    <div class="inpDiv">
                        <button>add marks</button>
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