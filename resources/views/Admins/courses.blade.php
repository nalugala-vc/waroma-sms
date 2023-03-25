@extends ('layouts.admin')

@section ('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<h2 id="h2">Courses Table</h2>
<div class="viewStudents lec">
    <table>
        <tr>
            <th>Name</th>
            <th>Short Name</th>
            <th>Course Admin</th>
            <th>Faculty</th>
            <th>Number of years</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($courses as $course)
        <tr>
            <td>{{$course->name}}</td>
            <td>{{$course->shortName}}</td>
            <td>{{$course->course_admin_id}}</td>
            <td>{{$course->faculty_id}}</td>
            <td>{{$course->number_of_years}}</td>
            <td><a href="/Admin/editCourses/{{$course->id}}">Edit</a></td>
            <td id="form">
                <span>
                <form action="/Admin/deleteCourse/{{$course->id}}" method="POST">
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