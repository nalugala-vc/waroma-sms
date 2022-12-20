@extends('layouts.lecturer')

@section('content')
<div class="display">
    <div class="maindiss">
        <div class="hello">
            <div class="lef">
                <h2>Hello {{$lecturer->name}}</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint neque at repellendus vero, explicabo expedita velit consectetur consequatur porro! Natus  at repellendus ghdhjj vero, explicabo expedita velit ?</p>
                <button>Change Details</button>
            </div>
            <div class="imgLec">
                <img src="/images/Copywriter.png" alt="">
            </div>
        </div>
        <div class="addingclass">
            <h3>Your Classes</h3>
            <span><i class="fa-solid fa-plus"></i> <a href="">add new class</a></span>
        </div>
        <div class="lecclasses">
            @forelse ($lecturer->classes as $classes)
            <div class="classOne">
                <a href="/class/{{$classes->id}}/{{$lecturer->id}}">
                    <div id="classOne">
                        <h4>{{$classes->name}}</h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, quo? Fugit, numquam. Numquam, quasi reiciendis facere a mollitia rerum quis?</p>
                        <div>
                            <span><b>50 students</b></span>
                            <a href="">go to class</a>
                        </div>
                    </div>
                </a>
            </div>
            @empty

            @endforelse
            
        </div>
    </div>
    <div class="classesetc">
        <div class="class">
            <div class="imgg">
                <img src="/images/pinkdesktop.png" alt="">
                <div>
                    <h5>Your Units</h5>
                    <h4>{{count($lecturer->units)}}</h4>
                </div>
            </div>
            <div>
                <button><i class="fa-solid fa-greater-than"></i></button>
            </div>
        </div>
        <div class="class">
            <div class="imgg">
                <img src="/images/purpledesktop.png" alt="">
                <div>
                    <h5>Your Classes</h5>
                    <h4>{{count($lecturer->classes)}}</h4>
                </div>
            </div>
            <div>
                <button><i class="fa-solid fa-greater-than"></i></button>
            </div>
        </div>
        <div class="class">
            <div class="imgg">
                <img src="/images/bluedesktop.png" alt="">
                <div>
                    <h5>Your Students</h5>
                    <h4>{{$stude}}</h4>
                </div>
            </div>
            <div>
                <button><i class="fa-solid fa-greater-than"></i></button>
            </div>
        </div>
        <div class="students">
            <div class="intro">
                <h4>Your Students</h4>
                <a href="">see all</a>
            </div>
            <div class="lecStudents">
                <div class="img">
                    <img src="/images/person.jpg" alt="">
                    <div class="infodiv">
                        <p>Venessa Chebukwa</p>
                    </div>
                </div>
                <div class="img">
                    <img src="/images/person.jpg" alt="">
                    <div class="infodiv">
                        <p>Venessa Chebukwa</p>
                    </div>
                </div>
                <div class="img">
                    <img src="/images/person.jpg" alt="">
                    <div class="infodiv">
                        <p>Venessa Chebukwa</p>
                    </div>
                </div>
                <div class="img">
                    <img src="/images/person.jpg" alt="">
                    <div class="infodiv">
                        <p>Venessa Chebukwa</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="virtual">
            <p>Join virtual discussion rooms with your students</p>
            <div>
                <button>join discussion</button>
            </div>
        </div>
    </div>
    
</div>
@endsection