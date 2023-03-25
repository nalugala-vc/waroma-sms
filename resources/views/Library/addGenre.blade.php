@extends ('layouts.library')

@section ('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<div class="libraryLinks">
    <a href="/Library/genre">Genres</a>
    <a href="/Library/addAuthors">Authors</a>
    <a href="/Library/addBook">Books</a>
</div>
<h2 id="h2">Add new Genre</h2>
<form  method="POST" action="/api/addGenre">
    @csrf
    <div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-file-signature"></i><span>Genre</span></label>
            <input type="text"  name="name" value="{{ old('genre') }}" required autocomplete="genre" id="" placeholder="Enter Genre">
            @error('genre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="button">
        <button type="submit">ADD GENRE</button>
    </div>
    </div>
</form>
<div class="viewRight">
        <a href="/Library/viewGenres">
            <span><i class="fa-solid fa-arrow-right"></i></span>
            <p>View Genres</p>
        </a>
</div>
@endsection