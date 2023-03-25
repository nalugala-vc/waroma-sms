@extends ('layouts.admin')

@section ('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<h2 id="h2">Edit Existing Faculty</h2>
<form  method="POST" action="/Admin/updateFaculty/{{$faculty->id}}">
    @csrf
    @method('PUT')
    <br><br><br><br>
    <div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-file-signature"></i><span>Faculty Name</span></label>
            <input type="text"  name="name" value="{{ $faculty->name }}" required autocomplete="name" id="" placeholder="Enter Faculty name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-arrow-down-short-wide"></i><span>Faculty ShortName</span></label>
            <input type="name"  name="short_name" value="{{$faculty->short_name}}" required autocomplete="short_name" id="" placeholder="Enter Faculty short_name">
            @error('short_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="button">
        <button type="submit">Edit Faculty</button>
    </div>
    </div>
</form>
<div class="viewRight">
        <a href="/Admin/viewFaculty">
            <span><i class="fa-solid fa-arrow-right"></i></span>
            <p>View Faculties</p>
        </a>
</div>
@endsection