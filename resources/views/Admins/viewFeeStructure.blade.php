@extends ('layouts.admin')

@section ('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<h2 id="h2">FeeStructure Table</h2>
<div class="viewStudents lec">
    <table>
        <tr>
            <th>ID</th>
            <th>Course</th>
            <th>Year</th>
            <th>Semester</th>
            <th>Full Amount</th>
            <th>Half Deposit</th>
            <th>Due Date</th>
            <th>First Instalment</th>
            <th>Due Date</th>
            <th>Second Instalment</th>
            <th>Due Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($fee as $fees)
        <tr>
            <td>{{$fees->id}}</td>
            <td>{{$fees->course->name}}</td>
            <td>{{$fees->year}}</td>
            <td>{{$fees->semister}}</td>
            <td>{{$fees->Full_amount}}</td>
            <td>{{$fees->half_deposit}}</td>
            <td>{{$fees->Due_Date}}</td>
            <td>{{$fees->first_instalment}}</td>
            <td>{{$fees->Due_Date_2}}</td>
            <td>{{$fees->second_instalment}}</td>
            <td>{{$fees->Due_Date_3}}</td>
            <td><a href="/Admin/editFeeStructure/{{$fees->id}}">Edit</a></td>
            <td id="form">
                <span>
                <form action="/Admin/deleteFeeStructure/{{$fees->id}}" method="POST">
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