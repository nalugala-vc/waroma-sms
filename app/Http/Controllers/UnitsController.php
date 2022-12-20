<?php

namespace App\Http\Controllers;
use App\Student;
use App\Unit;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class UnitsController extends Controller
{

    public function show($student){

        $student=Student::findOrFail($student);
        $registered_stud_units=[];
        $applicable_units=DB::table('units')->where('course_id',$student->course_id)->where('semester',$student->semester)->where('year',$student->year)->get();
        $registerd_units=DB::table('student_units')->where('student_id',$student->id)->get();
        $applicabo=[];
        $registered=[];
        $studentUnreg=[];
        $regg=[];

        foreach ($applicable_units as $applicable){
            array_push($applicabo,$applicable->id);
        }

        foreach ($registerd_units as $studUn){
            array_push($registered,$studUn->unit_id);
        }

        $unreg=array_diff($applicabo,$registered);

        foreach ($unreg as $studentUnregistered){
            $notReistered=DB::table('units')->where('id',$studentUnregistered)->get()->first();
            array_push($studentUnreg,$notReistered);
        }

        foreach ($registerd_units as $registered){
            $reistered=DB::table('units')->where('id',$registered->unit_id)->get()->first();
            array_push($regg,$reistered);

        }
       
  
        return view('students.units',[
            'student'=>$student,
            'regg'=>$regg,
            'studentUnreg'=>$studentUnreg
           
            
        ]);

    }
    

    public function store(){
       $data=request()->all();
       \App\StudentUnits::create($data);
       return redirect()->back();
       
    }
}
