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
<h2 id="h2">Authors Table</h2>
<div class="viewStudents lec">
    <table>
        <tr>
            <th>ID</th>
            <th>Genre</th>
            <th>Author's Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($author as $author)
        <tr>
            <td>{{$author->id}}</td>
            <td>{{$author->genre->name}}</td>
            <td>{{$author->name}}</td>
            <td><a href="/Library/editAuthors/{{$author->id}}">Edit</a></td>
            <td id="form">
                <span>
                <form action="/api/deleteAuthor/{{$author->id}}" method="POST">
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