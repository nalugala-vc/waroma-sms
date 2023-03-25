@extends ('layouts.admin')

@section ('content')

<div class="viewStudents">
    @if (session('application'))
            <div class="alert alert-success">
                {{ session('application') }}
            </div>
    @endif
    <table>
        <tr id="headers">
            <th>ID</th>
            <th>Picture</th>
            <th>Name</th>
            <th>Course</th>
            <th>Email</th>
            <th>Age</th>
            <th>Phone Number</th>
            <th>Former Highschool</th>
            <th>KCSE Grade</th>
            <th>KCSE Points</th>
            <th>Description</th>
            <th>Acceptance</th>
        </tr>
        @forelse ($applications as $application)
        <tr>
            <td>{{$application->id}}</td>
            <td><img src="/assets/{{$application->picture}}" alt=""></td>
            <td>{{$application->name}}</td>
            <td>{{$application->course_id}}</td>
            <td>{{$application->email}}</td>
            <td>{{$application->age}}</td>
            <td>{{$application->phone_number}}</td>
            <td>{{$application->former_highschool}}</td>
            <td>{{$application->KCSE_Grade}}</td>
            <td>{{$application->KCSE_points}}</td>
            <td>{{$application->student_description}}</td>
            <td id="form">
            
                <form action="/Admin/applications/accept" method="POST">
                    @csrf
                    @method('post')
                    <input type="hidden" value="{{$application->id}}" name="id">
                    <input type="hidden" value="{{$application->course_id}}" name="course_id">
                    <input type="hidden" value="{{$application->name}}" name="name">
                    <input type="hidden" value="{{$application->email}}" name="email">
                    <input type="hidden" value="{{$application->picture}}" name="picture">
                    <input type="hidden" value="{{$application->year}}" name="year">
                    <input type="hidden" value="{{$application->semester}}" name="semester">
                    <input type="hidden" value="{{$application->phone_number}}" name="phone_number">
                    <input type="hidden" value="{{$application->gender}}" name="gender">
                    <input type="hidden" value="{{$application->parent_name}}" name="parent_name">
                    <input type="hidden" value="{{$application->parent_email}}" name="parent_email">
                    <input type="hidden" value="{{$application->parent_no}}" name="parent_number">
                    <input type="hidden" value="{{$application->home_location}}" name="home_location">
                    <button type="submit" class="border-b-2 pb-2 border-dotted italic text-green-500">Accept</button>
                </form>
        
            </td>
        </tr>
        @empty

        <!-- <div class="imageApp">
            <img src="/images/searching.png" alt="">
        </div>
        <h3 style="margin-left:150%;">No recent applications yey</h3> -->
        <script>
            document.getElementById('headers').style.display='none';
        </script>

        <div style="margin-left: 200px;">
            <img src="/images/searching.png" alt="" style="height: 400px;">
        </div>
        <h3>No Recent Applications</h3>

        @endforelse
    </table>
</div>
@endsection