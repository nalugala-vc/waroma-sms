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
<h2 id="h2">View Genres</h2>
<div class="viewStudents lec">
    <table>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Delete</th>
        </tr>
        @foreach ($genre as $genre)
        <tr>
            <td>{{$genre->id}}</td>
            <td>{{$genre->name}}</td>
            <td id="form">
                <span>
                <form action="/api/deleteGenre/{{$genre->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="border-b-2 pb-2 border-dotted italic text-red-500">Delete</button>
                </form>
                </span>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection