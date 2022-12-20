@extends('layouts.mainDis')

@section('content')
<div class="serch">
    <input type="text" name="" id="" placeholder="search here">
    <button><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
<div class="backGroundChange marks">
    <div class="unitmarks">
    <div class="current">
        <h4>{{$unit->name}}</h4>
        <table>
            <tr>
                <th>Exam Name</th>
                <th>Your Marks</th>
                <th>weight</th>
            </tr>
            @forelse ($marks as $studentMarks)
            <tr>
                <td>{{$studentMarks->name}}</td>
                <td>{{$studentMarks->student_marks}}/{{$studentMarks->Max_marks}}</td>
                <td>{{$studentMarks->weight}}</td>
            </tr>
            @empty
            <tr>
                <td>No </td>
                <td>exams graded</td>
                <td>yet</td>
            </tr>
            @endforelse
        </table>
    </div>
    
    </div>
</div>

@endsection