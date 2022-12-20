@extends ('layouts.admin')

@section ('content')
<h2 id="h2">Register new lecturers</h2>
<form  method="POST" action="/Admin/addLec" enctype="multipart/form-data">
    @csrf
    <div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-user"></i><span>Name</span></label>
            <input type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus id="" placeholder="Enter lecturer name" >
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-envelope"></i> <span>Email</span></label>
            <input type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" id="" placeholder="Enter lecturer email">
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
            <input type="text" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus id="" placeholder="Enter lecturer phone number">
            @error('phone_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-venus-mars"></i> <span>Gender</span></label>
            <select name="gender" id="">
                <option value="">Choose lecturer's gender</option>
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
            <label for=""><i class="fa-solid fa-lock"></i> <span>Password</span></label>
            <input type="password" name="password" required autocomplete="new-password id=" placeholder="Enter lecturer password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-key"></i> <span>Confirm Password</span></label>
            <input type="password" name="password_confirmation" required autocomplete="new-password" id="" placeholder="Confirm lecturer password">
        </div>
    </div>
    <div class="inputs">
    <div class="inp">
            <label for=""><i class="fa-solid fa-image"></i> <span>Picture</span></label>
            <input type="file" name="profile_pic" id="" placeholder="Enter lecturer name">
            @error('picture')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    
    <div class="button">
        <button type="submit">REGISTER</button>
    </div>
    </div>
</form>
<div class="viewRight">
        <a href="/Admin/viewLecturers">
            <span><i class="fa-solid fa-arrow-right"></i></span>
            <p>View Lecturers</p>
        </a>
</div>
@endsection