@extends ('layouts.admin')

@section ('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<h2 id="h2">Update Course</h2>
<form  method="POST" action="/Admin/updateCourse/{{$courses->id}}">
    @csrf
    @method('PUT')
    <div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-file-signature"></i><span>Name</span></label>
            <input type="text" name="name" value="{{ $courses->name }}" required autocomplete="name" autofocus id="" placeholder="Enter Course name" >
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-arrow-down-short-wide"></i><span>shortName</span></label>
            <input type="text"  name="shortName" value="{{ $courses->shortName }}" required autocomplete="shortName" id="" placeholder="Enter Course shortName">
            @error('shortName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-people-roof"></i><span>Faculty</span></label>
            <select name="faculty_id" id="">
                <option value="">Choose Faculty</option>
                @foreach ($faculty as $faculty)
                <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                @endforeach
            </select>
            @error('faculty_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-user"></i></i> <span>Course Admin</span></label>
            <select name="course_admin_id" id="">
                <option value="">Choose Course Admin</option>
                @foreach ($course_admin as $course_admin)
                <option value="{{$course_admin->id}}">{{$course_admin->lecturers->name}}</option>
                @endforeach
            </select>
            @error('course_admin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="inputs">
    <div class="inp">
            <label for=""><i class="fa-solid fa-calendar"></i><span>Number of years</span></label>
            <input type="number" name="number_of_years"  value="{{$courses->number_of_years}}" placeholder="Enter Number of years">
            @error('number_of_years')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="button">
        <button type="submit">EDIT COURSE</button>
    </div>
    </div>
</form>
<div class="viewRight">
        <a href="/Admin/viewCourses">
            <span><i class="fa-solid fa-arrow-right"></i></span>
            <p>View Courses</p>
        </a>
</div>
@endsection