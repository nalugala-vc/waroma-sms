@extends ('layouts.admin')

@section ('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<h2 id="h2">Edit Schedule</h2>
<form  method="POST" action="/Admin/updateSchedule/{{$schedule->id}}">
    @csrf
    @method('PUT')
    <div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-file-signature"></i><span>Course</span></label>
           <input type="text" name="course_id" id="" value="{{$schedule->course->name}}">
            @error('course_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-arrow-down-short-wide"></i><span>Year</span></label>
            <input type="number"  name="year" value="{{ $schedule->year }}" required autocomplete="year" id="" placeholder="Enter Schedule year">
            @error('year')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-calendar"></i><span>Semister</span></label>
            <input type="number" name="semister" placeholder="Enter the Semester" value="{{$schedule->semister}}">
            @error('semister')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-people-roof"></i><span>Day Of The Week</span></label>
            <input type="text" name="day" value="{{$schedule->day}}">
            @error('day')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-calendar"></i><span>Start Time</span></label>
            <input type="time" name="start_time" id="" value="{{$schedule->start_time}}">
            @error('start_time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-calendar"></i><span>End Time</span></label>
            <input type="time" name="end_time" id="" value="{{$schedule->end_time}}">
            @error('end_time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-people-roof"></i><span>Unit</span></label>
            <select name="units_id" id="">
                <option value="{{$schedule->unit->id}}">{{$schedule->unit->name}}</option>
                @foreach($unit as $unit)
                <option value="{{$unit->id}}">{{$unit->name}}</option>
                @endforeach
            </select>
            @error('unit_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-people-roof"></i><span>Lecturer</span></label>
            <select name="lecturers_id" id="">
                <option value="{{$schedule->lecturer->id}}">{{$schedule->lecturer->name}}</option>
                @foreach($lecturer as $lecturer)
                <option value="{{$lecturer->id}}">{{$lecturer->name}}</option>
                @endforeach
            </select>
            @error('lecturers_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-calendar"></i><span>Equipments</span></label>
            <select name="equipments" id="">
                <option value="{{$schedule->equipments}}">{{$schedule->equipments}}</option>
                <option value="zoom">Zoom</option>
                <option value="Google Meet">Google Meet</option>
                <option value="Physical">Physical</option>
            </select>
            @error('equipments')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="button">
        <button type="submit">EDIT SCHEDULE</button>
    </div>
    </div>
</form>
<div class="viewRight">
        <a href="/Admin/viewSchedule">
            <span><i class="fa-solid fa-arrow-right"></i></span>
            <p>View Schedule</p>
        </a>
</div>
@endsection