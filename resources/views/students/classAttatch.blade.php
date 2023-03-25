@extends('layouts.mainDis')

@section('content')
<div class="serch">
    <input type="text" name="" id="" placeholder="search here">
    <button><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
<section class="banner">
    <h2>{{$class->name}}</h2>
    <p><b>{{$class->target_group}}</b></p>
</section>
<div class="backGroundChange attatch">
    <h2>{{$assignment->heading}}</h2>
    <p>{{$assignment->message}}</p>
    <div class="view">
            <a href="/viewStudents/{{$assignment->id}}">view assignment</a>
            <a href="/download/{{$assignment->attachment}}">Download assignment</a>
        </div>
</div>
@endsection