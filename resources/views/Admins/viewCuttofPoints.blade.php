@extends ('layouts.admin')

@section ('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<h2 id="h2">Cutoff Points Table</h2>
<div class="viewStudents lec">
    <table>
        <tr>
            <th>ID</th>
            <th>Course</th>
            <th>Cuttoff Points</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($cutoff as $cutoff)
        <tr>
            <td>{{$cutoff->id}}</td>
            <td>{{$cutoff->course->name}}</td>
            <td>{{$cutoff->cutoff}}</td>
            <td><a href="/Admin/editCutoff/{{$cutoff->id}}">Edit</a></td>
            <td id="form">
                <span>
                <form action="/Admin/deleteCutoff/{{$cutoff->id}}" method="POST">
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