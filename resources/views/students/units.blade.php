@extends('layouts.mainDis')

@section('content')
<div class="serch">
    <input type="text" name="" id="" placeholder="search here">
    <button><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
<div class="backGroundChange unitt">
    <div class="schedule units">
        <div class="h2">
            <h2>Registered Units</h2>
        </div>
        <table>
            <tr>
                <th>Unit Code</th>
                <th>Unit Name</th>
                <th>Year</th>
                <th>Semister</th>
                <th>Credits</th>
              
            </tr>
            @forelse ($regg as $registered)
            <tr>
                <td>{{$registered->code}}</td>
                <td>{{$registered->name}}</td>
                <td>{{$registered->year}}</td>
                <td>{{$registered->semester}}</td>
                <td>{{$registered->credits}}</td>
                
            </tr>
            @empty
            <tr>
                <td>you have </td>
                <td>not </td>
                <td>registered</td>
                <td>any</td>
                <td>applicable</td>
                <td>units</td>
            </tr>
            @endforelse
        </table>
        
        <div class="unregistered">
            <div class="h2">
                <h2>Registere Units Here</h2>
            </div>
        <table>
            <tr>
                <th>Unit Code</th>
                <th>Unit Name</th>
                <th>Register</th>
            </tr>
            @forelse ($studentUnreg as $unit)
            <tr>
                
                <td>{{$unit->code}}</td>
                <td>{{$unit->name}}</td>
                <form action="/units" method="post">
                @csrf
                <input type="hidden" name="student_id" value="{{$student->id}}">
                <input type="hidden" name="unit_id" value="{{$unit->id}}">
                <td class="venue"><button type="submit">register</button></td>
                </form>
            </tr>
            @empty
            <tr>
                <td>You have</td>
                <td>registered all</td>
                <td>applicable units</td>
            </tr>
            @endforelse
            
        </table>
        </div>
    </div>
</div>
@endsection
