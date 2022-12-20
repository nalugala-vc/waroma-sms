@extends('layouts.mainDis')

@section('content')
<div class="serch">
    <input type="text" name="" id="" placeholder="search here">
    <button><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
<div class="headds">
    <h2>Fee Structure</h2>
    <span><a href="">fee transactions &rarr;</a></span>
</div>
<div class="backGroundChange feestruct">
 
        @forelse ($feestructure as $fee)
        <table class="fees">
        <tr id="head">
            <th>{{$table_heads[0]}}</th>
            <td>year {{$fee->year}}</td> 
        </tr>
        <tr>
            <th>{{$table_heads[1]}}</th>
            <td>semester {{$fee->semister}}</td>
        </tr>
        <tr>
            <th>{{$table_heads[2]}}</th>
            <td>{{$fee->Full_amount}}</td>
        </tr>
        <tr>
            <th>{{$table_heads[3]}}</th>
            <td>{{$fee->half_deposit}}</td>
        </tr>
        <tr>
            <th>{{$table_heads[4]}}</th>
            <td>{{$fee->Due_Date}}</td>
        </tr>
        <tr>
            <th>{{$table_heads[5]}}</th>
            <td>{{$fee->first_instalment}}</td>
        </tr>
        <tr>
            <th>{{$table_heads[6]}}</th>
            <td>{{$fee->Due_Date_3}}/td>
        </tr>
        <tr>
            <th>{{$table_heads[7]}}</th>
            <td>{{$fee->second_instalment}}</td>
        </tr>
        <tr>
            <th>{{$table_heads[8]}}</th>  
            <td>{{$fee->Due_Date_3}}</td>
        </tr>
        </table>
        <br><br>
        @empty

        @endforelse
  
</div>
@endsection