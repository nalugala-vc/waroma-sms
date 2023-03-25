@extends ('layouts.admin')

@section ('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<h2 id="h2">Edit Existing Units</h2>
<form  method="POST" action="/Admin/updateUnits/{{$unit->id}}">
    @csrf
    @method('PUT')
    <div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-file-signature"></i><span>Name</span></label>
            <input type="text" name="name" value="{{ $unit->name }}" required autocomplete="name" autofocus id="" placeholder="Enter Course name" >
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-arrow-down-short-wide"></i><span>Unit Code</span></label>
            <input type="text"  name="code" value="{{ $unit->code }}" required autocomplete="code" id="" placeholder="Enter Unit code">
            @error('code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-people-roof"></i><span>Course</span></label>
            <select name="course_id" id="">
                <option value="{{$unit->course->id}}">{{$unit->course->name}}</option>
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
            <label for=""><i class="fa-solid fa-calendar"></i><span>Year</span></label>
            <input type="number" name="year" placeholder="Enter Year" value="{{$unit->year}}">
            @error('year')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-calendar"></i><span>Semester</span></label>
            <input type="number" name="semester" placeholder="Enter Semester" value="{{$unit->semester}}">
            @error('semester')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-calendar"></i><span>Credits</span></label>
            <input type="number" name="credits" placeholder="Enter credits" value="{{$unit->credits}}">
            @error('credits')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="button">
        <button type="submit">EDIT UNIT</button>
    </div>
    </div>
</form>
<div class="viewRight">
        <a href="/Admin/viewUnits">
            <span><i class="fa-solid fa-arrow-right"></i></span>
            <p>View Units</p>
        </a>
</div>
@endsection