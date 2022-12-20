@extends ('layouts.admin')

@section ('content')
<div id="cards">
    <div class="cards">
        <a href="">
            <img src="/images/global (8).png" alt="">
            <h3>500 students</h3>
        </a>
    </div>
    <div class="cards">
      <a href="">
            <img src="/images/support.png" alt="">
            <h3>30 courses</h3>
      </a>
    </div>
    <div class="cards">
       <a href="">
            <img src="/images/Copywriter.png" alt="">
            <h3>100 lecturers</h3>
       </a>
    </div>
    <div class="cards">
      <a href="">
        <img src="/images/New-message.png" alt="">
        <h3>300 applications</h3>
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
            @foreach($applications as $studApplications)
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
            @endforeach
            
        
    </div>
</div>
@endsection