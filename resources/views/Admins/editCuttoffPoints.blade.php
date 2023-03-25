@extends ('layouts.admin')

@section ('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<h2 id="h2">Edit Existing Cuttoff Points</h2>
<form  method="POST" action="/Admin/updateCutoff/{{$cutoff->id}}">
    @csrf
    @method('PUT')
    <br><br><br><br>
    <div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-file-signature"></i><span>Course</span></label>
            <input type="text"  name="cutoff" value="{{$cutoff->course->name}}" required autocomplete="cutoff" id="" placeholder="Enter Course cutoff">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-arrow-down-short-wide"></i><span>Cuttoff points</span></label>
            <input type="number"  name="cutoff" value="{{ $cutoff->cutoff }}" required autocomplete="cutoff" id="" placeholder="Enter Course cutoff">
            @error('cutoff')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="button">
        <button type="submit">Edit Cuttoff</button>
    </div>
    </div>
</form>
<div class="viewRight">
        <a href="/Admin/viewCutoffs">
            <span><i class="fa-solid fa-arrow-right"></i></span>
            <p>View Cuttoff Points</p>
        </a>
</div>
@endsection