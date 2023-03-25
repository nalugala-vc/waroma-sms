@extends('layouts.mainDis')

@section('content')
<div class="serch">
    <input type="text" name="" id="" placeholder="search here">
    <button><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
<div class="backGroundChange">
    <h2 id="attend">Library</h2>
    <div class="myattendance">
        <div class="libraryBooks">
            @foreach($book as $book)
            <div class="book">
                <div>
                    <img src="/storage/{{$book->bookCover}}" alt="">
                </div>
                <h4>{{$book->title}}</h4>
                <p>{{$book->author->name}}</p>
                <p>{{$book->genre->name}}</p>
                <div>
                    <a href="/viewBook/{{$book->id}}">read</a>
                    <a href="/downloadBook/{{$book->id}}">download</a>
                </div>
            </div>
            @endforeach
    </div>
    </div>
</div>
@endsection