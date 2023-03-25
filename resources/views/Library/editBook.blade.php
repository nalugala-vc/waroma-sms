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
<h2 id="h2">Edit Existing Book</h2>
<form  method="POST" action="/api/updateBook/{{$book->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-file-signature"></i><span>Title</span></label>
            <input type="text" name="title" value="{{ $book->title }}" required autocomplete="title" autofocus id="" placeholder="Enter Book title" >
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-arrow-down-short-wide"></i><span>Book Genre</span></label>
            <select name="genre_id" id="">
                <option value="{{$book->genre->id}}">{{$book->genre->name}}</option>
                @foreach ($genre as $genre)
                <option value="{{$genre->id}}">{{$genre->name}}</option>
                @endforeach
            </select>
            @error('genre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-people-roof"></i><span>Book Author</span></label>
            <select name="author_id" id="">
                <option value="{{$book->author->id}}">{{$book->author->name}}</option>
                @foreach ($author as $author)
                <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>
            @error('author_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inp">
            <label for=""><i class="fa-solid fa-calendar"></i><span>Select Book Cover</span></label>
            <input type="file" name="bookCover">
            @error('bookCover')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="inputs">
        <div class="inp">
            <label for=""><i class="fa-solid fa-calendar"></i><span>Select Document</span></label>
            <input type="file" name="pdf">
            @error('pdf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="button">
        <button type="submit">EDIT BOOK</button>
    </div>
    </div>
</form>
<div class="viewRight">
        <a href="/Admin/viewUnits">
            <span><i class="fa-solid fa-arrow-right"></i></span>
            <p>View Books</p>
        </a>
</div>
@endsection