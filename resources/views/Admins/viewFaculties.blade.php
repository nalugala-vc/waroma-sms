@extends ('layouts.admin')

@section ('content')
<h2 id="h2">Faculties Table</h2>
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<div class="viewStudents lec">
    <table>
        <tr>
            <th>ID</th>
            <th>Faculty Name</th>
            <th>Faculty Short</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($faculty as $faculty)
        <tr>
            <td>{{$faculty->id}}</td>
            <td>{{$faculty->name}}</td>
            <td>{{$faculty->short_name}}</td>
            <td><a href="/Admin/editFaculty/{{$faculty->id}}">Edit</a></td>
            <td id="form">
                <span>
                <form action="/Admin/deleteFaculty/{{$faculty->id}}" method="POST">
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