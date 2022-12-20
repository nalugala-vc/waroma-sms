@extends ('layouts.admin')

@section ('content')
<h2  class="space">Assign the lecturers their qualified units</h2>
<p id="p">please assign the lecturers their respective units.Kindly note that a unit can have more than one lecturer and a lecturer can have more than one units</p>
<form  method="POST" action="/Admin/assign" enctype="multipart/form-data">
    @csrf
    <div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-user"></i> <span>Lecturer</span></label>
            <select name="lecturer_id" id="">
                <option value="">Choose Lecturer</option>
                @foreach ($lecturer as $lec)
                <option value="{{$lec->id}}">{{$lec->name}}</option>
                @endforeach
            </select>
            @error('Lecturer')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-book"></i></i> <span>Unit</span></label>
            <select name="units_id" id="">
                <option value="">Choose Unit</option>
                @foreach ($units as $un)
                <option value="{{$un->id}}">{{$un->name}}</option>
                @endforeach
            </select>
            @error('Unit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    
    <div class="button">
        <button type="submit">ASSIGN</button>
    </div>
    </div>
</form>
@endsection