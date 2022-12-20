@extends ('layouts.admin')

@section ('content')
<div class="viewStudents">
    <table>
        <tr>
            <th>Admission number</th>
            <th>Picture</th>
            <th>Name</th>
            <th>Course</th>
            <th>Year</th>
            <th>Semester</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Parent Name</th>
            <th>Parent Email</th>
            <th>Parent Number</th>
            <th>Home Location</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td><img src="/assets/{{$student->picture}}" alt=""></td>
            <td>{{$student->name}}</td>
            <td>{{$student->course_id}}</td>
            <td>{{$student->year}}</td>
            <td>{{$student->semester}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->phone_number}}</td>
            <td>{{$student->parent_name}}</td>
            <td>{{$student->parent_email}}</td>
            <td>{{$student->parent_number}}</td>
            <td>{{$student->home_location}}</td>
            <td><a href="/Admin/editStudent/{{$student->id}}">Edit</a></td>
            <td id="form">
                <span>
                <form action="/Admin/deleteStudent/{{$student->id}}" method="POST">
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