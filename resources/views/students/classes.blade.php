@extends('layouts.mainDis')

@section('content')
<section class="banner">
    <h2>{{$class->name}}</h2>
    <p><b>{{$class->target_group}}</b></p>
</section>
<div class="backGroundChange">
    <div class="myattendance classs">
        <div class="tiles class">
            @forelse ($class->assignments as $assignments)
            <div class="tile class">
                    <a href="/assignments/{{$class->id}}/{{$assignments->id}}">
                        <div class="attendImg">
                            <img src="/images/global (2).png" alt="">
                        </div>
                        <div class="info">
                            <h4><span>New material : </span><span>{{$assignments->heading}}</span></h4>
                            <p><span>posted : </span> <span>{{$assignments->created_at}}</span></p>
                        </div>
                    </a>
            </div>
            @empty
            <div class="noAss">
                <img src="/images/happy.png" alt="">
                <h3>Wohoo No assignments so far</h3>
            </div>
            @endforelse
            
        </div>
    </div>
</div>
@endsection