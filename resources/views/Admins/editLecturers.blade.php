@extends ('layouts.admin')

@section ('content')
<h2 id="h2">Edit lecturer's details</h2>
<form  method="POST" action="/Admin/updateLecturer/{{$lecturer->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-user"></i><span>Name</span></label>
            <input type="text" name="name" value="{{$lecturer->name }}" required autocomplete="name" autofocus id="" placeholder="Enter student name" >
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-envelope"></i> <span>Email</span></label>
            <input type="email"  name="email" value="{{ $lecturer->email }}" required autocomplete="email" id="" placeholder="Enter student email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-phone"></i> <span>Phone Number</span></label>
            <input type="text" name="phone_number" value="{{ $lecturer->phone_number }}" required autocomplete="phone_number" autofocus id="" placeholder="Enter student phone number">
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
    </div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-image"></i> <span>Picture</span></label>
            <input type="file" name="profile_pic" id="" placeholder="Enter student name">
            @error('profile_pic')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    
    <div class="button">
        <button type="submit">EDIT</button>
    </div>
    </div>
</form>
<div class="viewRight">
        <a href="/Admin/addLecturerUnits">
            <span><i class="fa-solid fa-arrow-right"></i></span>
            <p>Add Lecturer Units</p>
        </a>
</div>
@endsection