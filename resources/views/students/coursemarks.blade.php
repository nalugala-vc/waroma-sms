@extends('layouts.mainDis')

@section('content')
<div class="serch">
    <input type="text" name="" id="" placeholder="search here">
    <button><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
<h2 id="attend">My Progress Report</h2>
<div class="backGroundChange marks">
    <div class="unitmarks">
    <div class="averages">
        <table>
            <h4>My Averages</h4>
            <tr id="head">
                <th>Units completed</th>
                <th>Total Marks</th>
                <th>Average Mark</th>
                <th>Average grade</th>
                <th>Total credits</th>
                <th>Compulsary credits</th>
            </tr>
            <tr>
                <td>21</td>
                <td>1475</td>
                <td>70.2</td>
                <td>A</td>
                <td>168</td>
                <td>108</td>
            </tr>
        </table>
    </div>
    <div class="current">
        <h4>Current Units</h4>
        <table>
            <tr>
                <th>Unit code</th>
                <th>Unit name</th>
                <th>year</th>
                <th>marks</th>
                <th>grade</th>
                <th>credits</th>
                <th>Details</a></th>
            </tr>
            @foreach ($student_units as $unit)
            <tr>
                <td>{{$unit->code}}</td>
                <td>{{$unit->name}}</td>
                <td>{{$unit->year}}</td>
                <td>marks</td>
                <td>grade</td>
                <td>{{$unit->credits}}</td>
                <td><a href="/unitmarks/{{$student->id}}/{{$unit->id}}">see details</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    <!-- <div class="current">
        <h4>Completed</h4>
        <table>
            <tr>
                <th>Unit code</th>
                <th>Unit name</th>
                <th>syllabus</th>
                <th>year</th>
                <th>marks</th>
                <th>grade</th>
                <th>credits</th>
                <th>GPV</th>
                <th>Details</a></th>
            </tr>
            <tr>
                <td>HED 1120</td>
                <td>Communications Skills</td>
                <td>BICS(FT)-17</td>
                <td>1</td>
                <td>78.3</td>
                <td>A</td>
                <td>3.00</td>
                <td>4.00</td>
                <td><a href="">see details</a></td>
            </tr>
            <tr>
                <td>HED 1120</td>
                <td>Communications Skills</td>
                <td>BICS(FT)-17</td>
                <td>1</td>
                <td>78.3</td>
                <td>A</td>
                <td>3.00</td>
                <td>4.00</td>
                <td><a href="">see details</a></td>
            </tr>
            <tr>
                <td>HED 1120</td>
                <td>Communications Skills</td>
                <td>BICS(FT)-17</td>
                <td>1</td>
                <td>78.3</td>
                <td>A</td>
                <td>3.00</td>
                <td>4.00</td>
                <td><a href="">see details</a></td>
            </tr>
            <tr>
                <td>HED 1120</td>
                <td>Communications Skills</td>
                <td>BICS(FT)-17</td>
                <td>1</td>
                <td>78.3</td>
                <td>A</td>
                <td>3.00</td>
                <td>4.00</td>
                <td><a href="">see details</a></td>
            </tr>
        </table>
    </div>
    <div class="current">
        <h4>Pending Units</h4>
        <table>
            <tr>
                <th>Unit code</th>
                <th>Unit name</th>
                <th>syllabus</th>
                <th>year</th>
                <th>marks</th>
                <th>grade</th>
                <th>credits</th>
                <th>GPV</th>
                <th>Details</a></th>
            </tr>
            <tr>
                <td>HED 1120</td>
                <td>Communications Skills</td>
                <td>BICS(FT)-17</td>
                <td>1</td>
                <td>78.3</td>
                <td>A</td>
                <td>3.00</td>
                <td>4.00</td>
                <td><a href="">see details</a></td>
            </tr>
            <tr>
                <td>HED 1120</td>
                <td>Communications Skills</td>
                <td>BICS(FT)-17</td>
                <td>1</td>
                <td>78.3</td>
                <td>A</td>
                <td>3.00</td>
                <td>4.00</td>
                <td><a href="">see details</a></td>
            </tr>
            <tr>
                <td>HED 1120</td>
                <td>Communications Skills</td>
                <td>BICS(FT)-17</td>
                <td>1</td>
                <td>78.3</td>
                <td>A</td>
                <td>3.00</td>
                <td>4.00</td>
                <td><a href="">see details</a></td>
            </tr>
            <tr>
                <td>HED 1120</td>
                <td>Communications Skills</td>
                <td>BICS(FT)-17</td>
                <td>1</td>
                <td>78.3</td>
                <td>A</td>
                <td>3.00</td>
                <td>4.00</td>
                <td><a href="">see details</a></td>
            </tr>
        </table>
    </div>-->
    </div> 
</div>
@endsection