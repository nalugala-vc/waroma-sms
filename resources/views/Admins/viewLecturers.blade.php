@extends ('layouts.admin')

@section ('content')
<h2 id="h2">Lecturers Table</h2>
<div class="viewStudents lec">
    <table>
        <tr>
            <th>Staff Number</th>
            <th>Picture</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Gender</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($lecturers as $lecturer)
        <tr>
            <td>{{$lecturer->id}}</td>
            <td><img src="/assets/{{$lecturer->profile_pic}}" alt=""></td>
            <td>{{$lecturer->name}}</td>
            <td>{{$lecturer->email}}</td>
            <td>{{$lecturer->phone_number}}</td>
            <td>{{$lecturer->gender}}</td>
            <td><a href="/Admin/editLecturer/{{$lecturer->id}}">Edit</a></td>
            <td id="form">
                <span>
                <form action="/Admin/deleteLecturer/{{$lecturer->id}}" method="POST">
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