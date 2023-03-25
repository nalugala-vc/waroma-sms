@extends ('layouts.admin')

@section ('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<h2 id="h2">Edit Existing Fee Structures</h2>
<form  method="POST" action="/Admin/updateFeeStructure/{{$fee->id}}">
    @csrf
    @method('PUT')
    <div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-file-signature"></i><span>Course</span></label>
            <input type="text" name="course_id" id="" value="{{$fee->course->name}}">
            @error('course_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-arrow-down-short-wide"></i><span>Year</span></label>
            <input type="number"  name="year" value="{{ $fee->year }}" required autocomplete="year" id="" placeholder="Enter Course year">
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
            <input type="number"  name="semister" value="{{ $fee->semister}}" required autocomplete="semister" id="" placeholder="Enter Semester">
            @error('semister')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-people-roof"></i><span>Full Amount</span></label>
            <input type="number" name="Full_amount" placeholder="Enter the full amount" value="{{$fee->Full_amount}}">
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
            <input type="number" name="half_deposit" placeholder="Enter the half deposit" value="{{$fee->half_deposit}}">
            @error('half_deposit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-calendar"></i><span>Half Deposit Due Date</span></label>
            <input type="date" name="Due_Date" id="" placeholder="Enter the Due Date" value="{{$fee->Due_Date}}">
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
            <input type="number" name="first_instalment" placeholder="Enter the first instalment" value="{{$fee->first_instalment}}">
            @error('first_instalment')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-calendar"></i><span>First Instalment Due Date</span></label>
            <input type="date" name="Due_Date_2" id="" placeholder="Enter the Due Date" value="{{$fee->Due_Date_2}}">
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
            <input type="number" name="second_instalment" placeholder="Enter the second instalment" value="{{$fee->second_instalment}}">
            @error('second_instalment')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>    
        <div class="inp">
            <label for=""><i class="fa-solid fa-calendar"></i><span>Second Instalment Due Date</span></label>
            <input type="date" name="Due_Date_3" id="" placeholder="Enter the Due Date" value="{{$fee->Due_Date_3}}">
            @error('Due_Date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="button">
        <button type="submit">EDIT FEESTRUCTURE</button>
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