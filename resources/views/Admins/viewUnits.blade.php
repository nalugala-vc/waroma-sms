@extends ('layouts.admin')

@section ('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<h2 id="h2">Lecturers Table</h2>
<div class="viewStudents lec">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Course</th>
            <th>Code</th>
            <th>Year</th>
            <th>Semester</th>
            <th>Credits</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($unit as $unit)
        <tr>
            <td>{{$unit->id}}</td>
            <td>{{$unit->name}}</td>
            <td>{{$unit->course->name}}</td>
            <td>{{$unit->code}}</td>
            <td>{{$unit->year}}</td>
            <td>{{$unit->semester}}</td>
            <td>{{$unit->credits}}</td>
            <td><a href="/Admin/editUnits/{{$unit->id}}">Edit</a></td>
            <td id="form">
                <span>
                <form action="/Admin/deleteUnits/{{$unit->id}}" method="POST">
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