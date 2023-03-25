@extends ('layouts.admin')

@section ('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<h2 id="h2">Add new Fee Structures</h2>
<form  method="POST" action="/Admin/addFeeStructure">
    @csrf
    <div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-file-signature"></i><span>Course</span></label>
            <select name="course_id" id="">
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
            <input type="number"  name="year" value="{{ old('year') }}" required autocomplete="year" id="" placeholder="Enter Course year">
            @error('year')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-arrow-down-short-wide"></i><span>Semester</span></label>
            <input type="number"  name="semister" value="{{ old('semister') }}" required autocomplete="semister" id="" placeholder="Enter Semester">
            @error('semister')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-people-roof"></i><span>Full Amount</span></label>
            <input type="number" name="Full_amount" placeholder="Enter the full amount">
            @error('Full_amount')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
    </div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-user"></i></i> <span>Half Deposit</span></label>
            <input type="number" name="half_deposit" placeholder="Enter the half deposit">
            @error('half_deposit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-calendar"></i><span>Half Deposit Due Date</span></label>
            <input type="date" name="Due_Date" id="" placeholder="Enter the Due Date">
            @error('Due_Date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        
    </div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-user"></i></i> <span>first Instalment</span></label>
            <input type="number" name="first_instalment" placeholder="Enter the first instalment">
            @error('first_instalment')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-calendar"></i><span>First Instalment Due Date</span></label>
            <input type="date" name="Due_Date_2" id="" placeholder="Enter the Due Date">
            @error('Due_Date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
       
    </div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-user"></i></i> <span>Second Instalment</span></label>
            <input type="number" name="second_instalment" placeholder="Enter the second instalment">
            @error('second_instalment')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>    
        <div class="inp">
            <label for=""><i class="fa-solid fa-calendar"></i><span>Second Instalment Due Date</span></label>
            <input type="date" name="Due_Date_3" id="" placeholder="Enter the Due Date">
            @error('Due_Date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="button">
        <button type="submit">ADD FEESTRUCTURE</button>
    </div>
    </div>
</form>
<div class="viewRight">
        <a href="/Admin/viewFeeStructure">
            <span><i class="fa-solid fa-arrow-right"></i></span>
            <p>View Courses</p>
        </a>
</div>
@endsection