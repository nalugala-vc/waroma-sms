<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Student;
use App\Assignments;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    public function index($student){
        $student=Student::findOrFail($student);
        $day=strtolower(date('l'));

      
        return view('students.home',[
            "student"=>$student,
        ]);
    }

    public function show($student){
        $student=Student::findOrFail($student);
    
        $attendance=$student->attendance;
        return view('students.attendance',[
            "student"=>$student,
        ]);

    }

    public function classes($student,$class){
        $student=Student::findOrFail($student);
        $class=Classes::findOrFail($class);

        return view('students.classes',[
            "student"=>$student,
            'class'=>$class,
        ]);

    }

    public function assignments($student,$class,$assignment){
        $student=Student::findOrFail($student);
        $class=Classes::findOrFail($class);
        $assignment=Assignments::findOrFail($assignment);

        return view('students.classAttatch',[
            "student"=>$student,
            'class'=>$class,
            'assignment'=>$assignment,
        ]);
        
    }

    public function view($assignment,$student){
        $student=Student::findOrFail($student);
        $assignment=Assignments::findOrFail($assignment);

        return view('students.viewAssignment',[
            "student"=>$student,
            'assignment'=>$assignment,
        ]);

    }

    public function attendance($student,$unit){
        $student=Student::findOrFail($student);
        $unit=Unit::findOrFail($unit);
    

        $attendance=DB::table('attendances')->where('student_id',$student->id)->where('unit_id',$unit->id)->get();

        return view('students.attendanceDeets',[
            "student"=>$student,
            'unit'=>$unit,
            'attendance'=>$attendance,
        ]);
    }

    public function coursework($student){
        $student=Student::findOrFail($student);

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

    public function unitmarks($student,$unit){
        $student=Student::findOrFail($student);
        $unit=Unit::findOrFail($unit);

        $marks=DB::table('studentmarks')->where('student_id',$student->id)->where('unit_id',$unit->id)->get();

        return view('students.coursemarksDeets',[
            "student"=>$student,
            'unit'=>$unit,
            'marks'=>$marks,

        ]);
    }

    
}
