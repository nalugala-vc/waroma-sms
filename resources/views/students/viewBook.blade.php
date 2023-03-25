@extends('layouts.mainDis')

@section('content')
<div class="serch">
    <input type="text" name="" id="" placeholder="search here">
    <button><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
<div class="backGroundChange feestruct">
    <div class="mainmain newClass">
        <iframe src="/storage/{{$book->pdf}}" width="800px" height="570px"></iframe>
    </div>
</div>
@endsection