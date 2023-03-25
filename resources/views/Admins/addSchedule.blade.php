@extends ('layouts.admin')

@section ('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<h2 id="h2">Add new Schedule</h2>
<form  method="POST" action="/Admin/addSchedule">
    @csrf
    <div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-file-signature"></i><span>Course</span></label>
            <select name="courses_id" id="">
                <option value="">Choose Course</option>
                @foreach ($course as $course)
                <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select>
            @error('course_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-arrow-down-short-wide"></i><span>Year</span></label>
            <input type="number"  name="year" value="{{ old('year') }}" required autocomplete="year" id="" placeholder="Enter Schedule year">
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
            <input type="number" name="semister" placeholder="Enter the Semester">
            @error('semister')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-people-roof"></i><span>Day Of The Week</span></label>
            <select name="day" id="">
                <option value="">Choose the day</option>
                <option value="monday">Monday</option>
                <option value="tuesday">Tuesday</option>
                <option value="wednesday">Wednesday</option>
                <option value="thursday">Thursday</option>
                <option value="friday">Friday</option>
            </select>
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
            <input type="time" name="start_time" id="">
            @error('start_time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-calendar"></i><span>End Time</span></label>
            <input type="time" name="end_time" id="">
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
                <option value="">Choose Unit</option>
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
                <option value="">Choose Unit</option>
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
                <option value="">Choose the equipment</option>
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
        <button type="submit">ADD SCHEDULE</button>
    </div>
    </div>
</form>
<div class="viewRight">
        <a href="/Admin/viewSchedule">
            <span><i class="fa-solid fa-arrow-right"></i></span>
            <p>View Courses</p>
        </a>
</div>
@endsection