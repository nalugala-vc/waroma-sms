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
<h2 id="h2">Books Table</h2>
<div class="viewStudents lec">
    <table>
        <tr>
            <th>ID</th>
            <th>Book Cover</th>
            <th>Genre</th>
            <th>Author's Name</th>
            <th>Book Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($book as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td id="imaging"><img src="/storage/{{$book->bookCover}}" alt=""></td>
                <td>{{$book->genre->name}}</td>
                <td>{{$book->author->name}}</td>
                <td>{{$book->name}}</td>
                <td><a href="/Library/editBook/{{$book->id}}">Edit</a></td>
                <td id="form">
                    <span>
                    <form action="/api/deleteBook/{{$book->id}}" method="POST">
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