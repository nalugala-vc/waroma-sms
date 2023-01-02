<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Student;
use App\Assignments;
use App\Books;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    public function index(){
        $student=auth('students')->user();
        // $student=Student::findOrFail($student);
        $day=strtolower(date('l'));

      
        return view('students.home',[
            "student"=>$student,
        ]);
    }

    public function login(Request $request)
    {
    
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:8'
      ]);

      if (Auth::guard('students')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        return redirect()->intended(route('home'));
      }

    
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function show(){
        $student=auth('students')->user();
    
        $attendance=$student->attendance;
        return view('students.attendance',[
            "student"=>$student,
        ]);

    }

    public function classes($class){
        $student=auth('students')->user();
        $class=Classes::findOrFail($class);

        return view('students.classes',[
            "student"=>$student,
            'class'=>$class,
        ]);

    }

    public function assignments($class,$assignment){
        $student=auth('students')->user();
        $class=Classes::findOrFail($class);
        $assignment=Assignments::findOrFail($assignment);

        return view('students.classAttatch',[
            "student"=>$student,
            'class'=>$class,
            'assignment'=>$assignment,
        ]);
        
    }

    public function view($assignment){
        $student=auth('students')->user();
        $assignment=Assignments::findOrFail($assignment);

        return view('students.viewAssignment',[
            "student"=>$student,
            'assignment'=>$assignment,
        ]);

    }

    public function attendance($unit){
        $student=auth('students')->user();
        $unit=Unit::findOrFail($unit);
        $totalDurationTime=0;
        $totalAbsentTime=0;
        $attendancePercent=0;

        $totalDuration=DB::table('attendances')->where('student_id',$student->id)->where('unit_id',$unit->id)->get('Duration');

        if(empty($totalDuration)){
            $totalDurationTime=0;
        }
        foreach($totalDuration as $totalDuration){
            $totalDurations=$totalDuration->Duration;
            $totalDurationTime=$totalDurationTime+$totalDurations;
    
        }

        

        $totalAbsent=DB::table('attendances')->where('student_id',$student->id)->where('unit_id',$unit->id)->where('Attendance','absent')->get('Duration');

        if(empty($totalAbsent)){
            $totalAbsentTime=0;
        }

        foreach($totalAbsent as $totalAbsent){
            $totalAbsents=$totalAbsent->Duration;
            $totalAbsentTime=$totalAbsentTime+$totalAbsents;
        }
    
        if($totalDurationTime==0){
            echo $totalDurationTime;
            $attendancePercent=0;
        }else{
            $attendancePercent=($totalAbsentTime/$totalDurationTime)*100;

        }

        // 007eJxTYND8cvnnjd9blTI23th7KEzOrPLnih/R6VylIqmSwQfu/FBQYEhNSjNPNkwzSEpLTTFJM01NtEg2sbRINUs1NDJNM00yD1DanNwQyMhQ2HmbkZEBAkF8NobyxKL83EQGBgCFGCMt

        $attendance=DB::table('attendances')->where('student_id',$student->id)->where('unit_id',$unit->id)->get();

        return view('students.attendanceDeets',[
            "student"=>$student,
            'unit'=>$unit,
            'attendance'=>$attendance,
            
        ])->with('attend','400');
    }

    public function enrol(){
        $student=auth('students')->user();

        return view('students.enrolment',[
            'student'=>$student,
        ]);
    }

    public function coursework(){
        $student=auth('students')->user();

        $registered_units=DB::table('student_units')->where('student_id',$student->id)->get();
        $student_units=[];

        foreach ($registered_units as $units){
            $unit_details=DB::table('units')->where('id',$units->unit_id)->get()->first();
            array_push($student_units,$unit_details);
        }
        
        return view('students.coursemarks',[
            "student"=>$student,
            'student_units'=>$student_units,
        ]);
    }

    public function unitmarks($unit){
        $student=auth('students')->user();
        $unit=Unit::findOrFail($unit);

        $marks=DB::table('studentmarks')->where('student_id',$student->id)->where('unit_id',$unit->id)->get();

        return view('students.coursemarksDeets',[
            "student"=>$student,
            'unit'=>$unit,
            'marks'=>$marks,

        ]);
    }

    public function library()
    {
        $book=Books::all();
        $student=auth('students')->user();
        return view('students.library',[
            'book'=>$book,
            'student'=>$student
        ]);
    }

    public function logout(){
        Auth::logout();
    
        return redirect('/login');
    }

    
}
