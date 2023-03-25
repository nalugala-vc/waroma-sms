<?php

namespace App\Http\Controllers;
use App\Lecturer;
use App\Classes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddmarksController extends Controller
{
    
    public function create(\App\Classes $class){
        
        $lecturer=auth('lecturer')->user();
        date_default_timezone_set('Africa/Nairobi');
    
        
        $schedule=DB::table('schedules')->where('lecturers_id',$lecturer->id)->where('day',strtolower(date('l')))->where('start_time','>',date('H:i:s'))->get();
        $UnitNames=[];
        $start_time=[];
        $CourseNames=[];
        foreach($schedule as $lecSchedule){
            array_push($start_time,$lecSchedule->start_time);
            $unit_name=DB::table('units')->where('id',$lecSchedule->units_id)->get();
            foreach($unit_name as $unit_name){
                array_push($UnitNames,$unit_name->name);
                $course_name=DB::table('courses')->where('id',$unit_name->course_id)->get();
                foreach($course_name as $course_name){
                    array_push($CourseNames,$course_name->shortName);
                }
            }
        }


        return view('lecturer.addmarks',[
            'lecturer'=>$lecturer,
            'class'=>$class,
            'schedule'=>$schedule,
            'UnitNames'=>$UnitNames,
            'start_time'=>$start_time,
            'CourseNames'=>$CourseNames,
        ]);
    }

    public function store(){
        $data=request()->validate([
            'student_id'=>'required',
            'unit_id'=>'required',
            'class_id'=>'required',
            'name'=>'required',
            'student_marks'=>'required',
            'Max_marks'=>'required',
            'weight'=>'required',
        ]);

        \App\Studentmarks::create($data);
        dd(request()->all());
    }

    public function edit($class){
        $lecturer=auth('lecturer')->user();
        $class=Classes::findOrFail($class);
        $update=DB::table('studentmarks')->where('unit_id',$class->unit_id)->get();
       
        date_default_timezone_set('Africa/Nairobi');

        $schedule=DB::table('schedules')->where('lecturers_id',$lecturer->id)->where('day',strtolower(date('l')))->where('start_time','>',date('H:i:s'))->get();
        $UnitNames=[];
        $start_time=[];
        $CourseNames=[];
        foreach($schedule as $lecSchedule){
            array_push($start_time,$lecSchedule->start_time);
            $unit_name=DB::table('units')->where('id',$lecSchedule->units_id)->get();
            foreach($unit_name as $unit_name){
                array_push($UnitNames,$unit_name->name);
                $course_name=DB::table('courses')->where('id',$unit_name->course_id)->get();
                foreach($course_name as $course_name){
                    array_push($CourseNames,$course_name->shortName);
                }
            }
        }
        return View('lecturer.editmarks',[
            'lecturer'=>$lecturer,
            'class'=>$class,
            'schedule'=>$schedule,
            'UnitNames'=>$UnitNames,
            'start_time'=>$start_time,
            'CourseNames'=>$CourseNames,
            'update'=>$update,
        ]);
    }

    public function updated(){
        DB::table('studentmarks')->where('student_id',request()->student_id)->where('unit_id',request()->unit_id)->where('class_id',request()->class_id)->where('name',request()->name)->update([
            'student_marks'=>request()->student_marks,
            'Max_marks'=>request()->Max_marks,
            'weight'=>request()->weight
        ]);
        echo "<script> alert('record updated successfully'); </script> ";
        return redirect()->back();
    }
}
