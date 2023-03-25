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
<h2 id="h2">Add New Author</h2>
<form  method="POST" action="/api/addAuthor">
    @csrf
    <div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-file-signature"></i><span>Genre</span></label>
            <select name="genre_id" id="">
                <option value="">Choose Genre</option>
                @foreach ($genre as $genre)
                <option value="{{$genre->id}}">{{$genre->name}}</option>
                @endforeach
            </select>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-arrow-down-short-wide"></i><span>Author Name</span></label>
            <input type="text"  name="name" value="{{ old('name') }}" required autocomplete="name" id="" placeholder="Enter Author's Name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="button">
        <button type="submit">ADD AUTHOR</button>
    </div>
    </div>
</form>
<div class="viewRight">
        <a href="/Library/viewAuthors">
            <span><i class="fa-solid fa-arrow-right"></i></span>
            <p>View Authors</p>
        </a>
</div>
@endsection