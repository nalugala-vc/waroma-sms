@extends ('layouts.admin')

@section ('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<h2 id="h2">Add new Cuttoff Points</h2>
<form  method="POST" action="/Admin/addCutoff">
    @csrf
    <br><br><br><br>
    <div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-file-signature"></i><span>Course</span></label>
            <select name="course_id" id="">
                <option value="">Choose Course</option>
                @forelse ($cutoff as $cutoff)
                <option value="{{$cutoff->id}}">{{$cutoff->name}}</option>
                @empty
                <option value="">No Course without a cutoff</option>
                @endforelse
            </select>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-arrow-down-short-wide"></i><span>Cuttoff points</span></label>
            <input type="number"  name="cutoff" value="{{ old('cutoff') }}" required autocomplete="cutoff" id="" placeholder="Enter Course cutoff">
            @error('cutoff')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="button">
        <button type="submit">Add Cuttoff</button>
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