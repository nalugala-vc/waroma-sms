@extends ('layouts.admin')

@section ('content')
<h2 id="h2">Edit students info</h2>
<form  method="POST" action="/Admin/updateStudents/{$students->id}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-user"></i><span>Name</span></label>
            <input type="text" value="{{$students->name}}" name="name" required autocomplete="name" autofocus id="" placeholder="Enter student name" >
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-envelope"></i> <span>Email</span></label>
            <input type="email" value="{{$students->email}}"  name="email"  required autocomplete="email" id="" placeholder="Enter student email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-image"></i> <span>Picture</span></label>
            <input type="file" value="{{$students->picture}}" name="picture" id="" placeholder="Enter student name">
            @error('picture')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-book"></i> <span>Course</span></label>
            <select name="course_id" id="">
                <option value="">Choose the course</option>
                @foreach($course as $studcourse)
                <option value="{{$studcourse->id}}">{{$studcourse->name}}</option>
               @endforeach
            </select>
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-calendar-days"></i> <span>year</span></label>
            <input type="number" name="year" value="{{$students->year}}" required autocomplete="year" autofocus id="" placeholder="Enter year">
            @error('year')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-pen"></i> <span>Semester</span></label>
            <input type="number" name="semester" id="" placeholder="Enter semester" value="{{$students->semester}}">
            @error('semester')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-phone"></i> <span>Phone Number</span></label>
            <input type="text" name="phone_number" value="{{$students->phone_number}}" required autocomplete="phone_number" autofocus id="" placeholder="Enter student phone number">
            @error('phone_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-venus-mars"></i> <span>Gender</span></label>
            <select name="gender" id="">
                <option value="">Choose student's gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-person-chalkboard"></i> <span>Parent Name</span></label>
            <input type="text" name="parent_name" value="{{$students->parent_name}}" required autocomplete="parent_name" autofocus id="" placeholder="Enter parent name" >
            @error('parent_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-chalkboard-user"></i> <span>Parent Email</span></label>
            <input type="email"name="parent_email"value="{{$students->parent_email}}" required autocomplete="parent_email" autofocus id="" placeholder="Enter parent email">
            @error('parent_email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-chalkboard-user"></i> <span>Parent Number</span></label>
            <input type="text"name="parent_number" value="{{$students->parent_number}}" required autocomplete="parent_number" autofocus id="" placeholder="Enter parent number">
            @error('parent_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-location-dot"></i> <span>Home Location</span></label>
            <input type="text"name="home_location"value="{{$students->home_location}}" required autocomplete="home_location" autofocus id="" placeholder="Enter student home location">
            @error('home_location')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    
    <div class="button">
        <button type="submit">UPDATE</button>
    </div>
    </div>
</form>
<div class="viewRight">
        <a href="/Admin/viewStudents">
            <span><i class="fa-solid fa-arrow-right"></i></span>
            <p>View Students</p>
        </a>
</div>
@endsection