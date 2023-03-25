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
<h2 id="h2">Edit Author</h2>
<form  method="POST" action="/api/updateAuthor/{{$author->id}}">
    @csrf
    @method('PUT')
    <div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-file-signature"></i><span>Genre</span></label>
            <select name="genre_id" id="">
                <option value="{{$author->genre->id}}">{{$author->genre->name}}</option>
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
            <input type="text"  name="name" value="{{ $author->name }}" required autocomplete="name" id="" placeholder="Enter Author's Name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="button">
        <button type="submit">EDIT AUTHOR</button>
    </div>
    </div>
</form>
<div class="viewRight">
        <a href="/Admin/viewUnits">
            <span><i class="fa-solid fa-arrow-right"></i></span>
            <p>View Units</p>
        </a>
</div>
@endsection