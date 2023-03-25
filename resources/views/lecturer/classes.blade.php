@extends('layouts.lecturer')

@section('content')
<div class="mainDiv">
    <div class="mainmain newClass">
        <section class="banner">
            <h2>{{$class->name}}</h2>
            <p><b>{{$class->target_group}}</b></p>
        </section>
        <div class="links">
            <a href="/class/{{$class->id}}" id="active">Classwork</a>
            <a href="/students/{{$class->id}}">Students</a>
            <a href="/attendance/{{$class->id}}">Attendance</a>
            <a href="/marks/{{$class->id}}">Marks</a>
            <a href="/work/{{$class->id}}" id="add">add work</a>
        </div>
        <div class="classwork">
            @forelse ($class->assignments as $assignments)
                <a href="/showWork/{{$class->id}}/{{$assignments->id}}">
                    <div class="tile class">
                        <div class="attendImg">
                            <img src="/images/global (1).png" alt="">
                        </div>
                        <div class="info">
                            <h4><span>New material : </span><span>{{$assignments->heading}}</span></h4>
                            <p><span>posted : </span> <span> {{$assignments->created_at}}</span></p>
                        </div>
                        
                    </div>
                </a>
            @empty
            <div class="emptyClass">
                <img src="/images/searching.png" alt="">
                <h3>No assignments yet!</h3>
                <a href="/work/{{$class->id}}">add assignments</a>
            </div>
            @endforelse
            
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