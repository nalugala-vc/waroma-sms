<?php

namespace App\Http\Controllers;
use App\Lecturer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddClassController extends Controller
{

    
    public function create(){
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


        return view('lecturer.addclass',[
            'lecturer'=>$lecturer,
            'schedule'=>$schedule,
            'UnitNames'=>$UnitNames,
            'start_time'=>$start_time,
            'CourseNames'=>$CourseNames,
        ]);
    }

    public function store(){
        $data=request()->validate([
            'name'=>'required',
            'target_group'=>'required',
            'unit_id'=>'required',
            'lecturer_id'=>'required',
            'enrolment_key'=>'required',
            'password'=>'required',
        ]);

        \App\Classes::create($data);
        dd(request()->all());
    }

    public function show(\App\Classes $class){
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

        return view('lecturer.classes',[
            'lecturer'=>$lecturer,
            'class'=>$class,
            'schedule'=>$schedule,
            'UnitNames'=>$UnitNames,
            'start_time'=>$start_time,
            'CourseNames'=>$CourseNames,
        ]);
    }

    public function students(\App\Classes $class){
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


        return view('lecturer.students',[
            'lecturer'=>$lecturer,
            'class'=>$class,
            'schedule'=>$schedule,
            'UnitNames'=>$UnitNames,
            'start_time'=>$start_time,
            'CourseNames'=>$CourseNames,
        ]);
    }

    public function attendance(\App\Classes $class){
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


        return view('lecturer.attendance',[
            'lecturer'=>$lecturer,
            'class'=>$class,
            'schedule'=>$schedule,
            'UnitNames'=>$UnitNames,
            'start_time'=>$start_time,
            'CourseNames'=>$CourseNames,
        ]);
    }
}
