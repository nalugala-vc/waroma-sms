@extends ('layouts.admin')

@section ('content')
<div id="cards">
    <div class="cards">
        <a href="/Admin/students">
            <img src="/images/global (8).png" alt="">
            <h3>{{$countStud}} students</h3>
        </a>
    </div>
    <div class="cards">
      <a href="/Admin/courses">
            <img src="/images/support.png" alt="">
            <h3>{{$countCourse}} courses</h3>
      </a>
    </div>
    <div class="cards">
       <a href="/Admin/lecturers">
            <img src="/images/Copywriter.png" alt="">
            <h3>{{$countLec}} lecturers</h3>
       </a>
    </div>
    <div class="cards">
      <a href="/Admin/applications">
        <img src="/images/New-message.png" alt="">
        <h3>{{$countApp}} applications</h3>
      </a>
    </div>
</div>
<div class="tables">
    <div class="students">
        <h3>Recently added students</h3>
        <table>
            <tr class="head">
                <th>Admission No</th>
                <th>Picture</th>
                <th>Name</th>
                <th>Course</th>
                <th>Email</th>
                <th>phone no</th>
            </tr>
            @foreach($students as $std)
            <tr>
                <td>{{$std->id}}</td>
                <td><img src="/assets/{{$std->picture}}" alt=""></td>
                <td>{{$std->name}}</td>
                <td>BICS</td>
                <td>{{$std->email}}</td>
                <td>{{$std->phone_number}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="applications">
        <h3>Applications</h3>
        <div class="applyy">
            @forelse($applications as $studApplications)
            <div class="apply">
                <div>
                    <h4>Name:{{$studApplications->name}}</h4>
                    <p>Course:BBIT</p>
                    <p>KCSE:{{$studApplications->KCSE_points}}</p>
                </div>
                <div>
                    <button>Accept</button>
                </div>
            </div>
            @empty
            <div>
                <img src="/images/searching.png" alt="" style="height: 200px; margin-left:70px;">
                <h3 style="color: #3f85b9;">No recent applications</h3>
            </div>
            @endforelse
            
        
    </div>
</div>
@endsection