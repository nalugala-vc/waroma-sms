@extends('layouts.lecturer')

@section('content')
<div class="mainDiv">
    <div class="mainmain newClass">
        <section class="banner">
            <h2>{{$class->name}}</h2>
            <p><b>{{$class->target_group}}</b></p>
        </section>
        <div class="links">
            <a href="/class/{{$class->id}}/{{$lecturer->id}}" id="active">Classwork</a>
            <a href="/students/{{$class->id}}/{{$lecturer->id}}">Students</a>
            <a href="/attendance/{{$class->id}}/{{$lecturer->id}}">Attendance</a>
            <a href="/marks/{{$class->id}}/{{$lecturer->id}}">Marks</a>
            <a href="" id="add">add work</a>
        </div>
       <div class="addwork">
            <form action="/work" method="post" id="newclass" enctype="multipart/form-data">
                @csrf
                <div class="space">
                    <div class="inpDiv">
                        <label for=""><i class="fa-solid fa-chalkboard-user"></i><b>Heading</b></label>
                        <input type="text" name="heading" id="" placeholder="enter heading">
                    </div>
                    <div class="inpDiv">
                        <label for=""><i class="fa-regular fa-calendar"></i><b>Due Date</b></label>
                        <input type="hidden" name="Due_Time" value="23:59:00">
                        <input type="date" name="Due_Date" id="">
                    </div>
                </div>
                <div class="space">
                    <div class="inpDiv">
                        <label for=""><i class="fa-solid fa-paperclip"></i></i><b>Attatchment</b></label>
                        <input type="file" name="attachment" id="">
                    </div>
                    <div class="inpDiv">
                        <label for=""><i class="fa-solid fa-file-circle-check"></i><b>Marks</b></label>
                        <input type="number" name="marks" id="" placeholder="enter enrolment Key">
                    </div>
                </div>
                <div class="space">
                    <div class="inpDiv">
                        <label for=""><i class="fa-solid fa-laptop-file"></i><b>Message</b></label>
                        <input type="hidden" name="class_id" value="{{$class->id}}">
                        <textarea name="message" id="" cols="70" rows="5" placeholder="Type your message here..."></textarea>
                    </div>
                    <div class="inpDiv">
                        <button>add work</button>
                    </div>
                </div>
            </form>
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