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
            <th>Courses</th>
            <th>Year</th>
            <th>Semester</th>
            <th>Day</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Unit</th>
            <th>Lecturer</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($schedule as $schedule)
        <tr>
            <td>{{$schedule->id}}</td>
            <td>{{$schedule->course->name}}</td>
            <td>{{$schedule->year}}</td>
            <td>{{$schedule->semister}}</td>
            <td>{{$schedule->day}}</td>
            <td>{{$schedule->start_time}}</td>
            <td>{{$schedule->end_time}}</td>
            <td>{{$schedule->unit->name}}</td>
            <td>{{$schedule->lecturer->name}}</td>
            <td><a href="/Admin/editSchedule/{{$schedule->id}}">Edit</a></td>
            <td id="form">
                <span>
                <form action="/Admin/deleteSchedule/{{$schedule->id}}" method="POST">
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