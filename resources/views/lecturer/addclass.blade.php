@extends('layouts.lecturer')

@section('content')
<div class="mainDiv">
    <div class="mainmain newClass">
        <h2>CREATE A CLASS</h2>
        <p>Add a new class platform to share content with your studenst</p>
        <form action="/class" method="post" id="newclass" >
        @csrf
            <div class="space">
                    
                <div class="inpDiv">
                    <label for="classname"><i class="fa-solid fa-chalkboard-user"></i><b>Class Name</b></label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="enter class name">
                    @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="inpDiv">
                    <label for=""><i class="fa-solid fa-users"></i><b>Target Group</b></label>
                    <input id="target_group" type="text" class="form-control @error('target_group') is-invalid @enderror" name="target_group" value="{{ old('target_group') }}" required autocomplete="target_group" autofocus placeholder="enter class target_group">
                    @error('target_group')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
            </div>
            <div class="space">
                <div class="inpDiv">
                    <label for=""><i class="fa-solid fa-laptop-file"></i><b>Unit</b></label>
                    <select name="unit_id" id="" >
                        <option value="">Choose the unit</option>
                        @foreach ($lecturer->units as $units)
                        <option value="{{$units->id}}">{{$units->name}}</option> 
                        @endforeach
                    </select>
                </div>
                <div class="inpDiv">
                    <label for=""><i class="fa-solid fa-key"></i><b>Enrolment Key</b></label>
                    <input id="enrolment_key" type="text" class="form-control @error('enrolment_key') is-invalid @enderror" name="enrolment_key" value="{{ old('enrolment_key') }}" required autocomplete="enrolment_key" autofocus placeholder="enter class enrolment_key">
                    @error('enrolment_key')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
            </div>
            <div class="space">
                <div class="inpDiv">
                    <label for=""><i class="fa-solid fa-lock"></i><b>Password</b></label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="enter class password">
                    <input type="hidden" name="lecturer_id" value="{{$lecturer->id}}">
                    @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="inpDiv">
                    <button type="submit">create class</button>
                </div>
            </div>

        </form>
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