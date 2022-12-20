<?php

namespace App\Http\Controllers;
use \App\Lecturer;
use \App\Assignments;
use \App\Classes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddworkController extends Controller
{
    public function create(\App\Classes $class,$lecturer){
        $lecturer=Lecturer::findOrFail($lecturer);
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


        return view('lecturer.addwork',[
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
            'heading'=>'required',
            'message'=>'required',
            'class_id'=>'required',
            'attachment'=>'required',  
        ]);
        $data=new \App\Assignments;
        $file=request()->attachment;
        $filename=time().'.'.$file->getClientOriginalExtension();
        request()->attachment->move('assets',$filename);

        $data->heading=request()->heading;
        $data->message=request()->message;
        $data->class_id=request()->class_id;
        $data->attachment=$filename;
        $data->Due_Date=request()->Due_Date;
        $data->marks=request()->marks;
        $data->Due_Time=request()->Due_Time;
        $data->save();
    //    \App\Assignments::create($data);
        return redirect()->back();
    }

    // public function show(\App\Classes $class,\App\Assignments $assignments,$lecturer){

    //     $lecturer=Lecturer::findOrFail($lecturer);
    //     return view('lecturer.classAttatch',[
    //         'lecturer'=>$lecturer,
    //         'class'=>$class,
    //         'assignments'=>$assignments,
    //     ]);
    // }

    public function show($class,$assignments,$lecturer){
        $lecturer=Lecturer::findOrFail($lecturer);
        $class=Classes::findOrFail($class);
        $assignments=Assignments::findOrFail($assignments);
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

        return view('lecturer.classAttatch',[
            'lecturer'=>$lecturer,
            'class'=>$class,
            'assignments'=>$assignments,
            'schedule'=>$schedule,
            'UnitNames'=>$UnitNames,
            'start_time'=>$start_time,
            'CourseNames'=>$CourseNames,
        ]);
    }

    public function download($assignments){

        return response()->download(public_path('assets/'.$assignments));
    }

    public function view($assignments,$lecturer){
        $lecturer=Lecturer::findOrFail($lecturer);
        $assignments=Assignments::findOrFail($assignments);

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

        return view('lecturer.viewAssignment',[
            'assignments'=>$assignments,
            'lecturer'=>$lecturer,
            'schedule'=>$schedule,
            'UnitNames'=>$UnitNames,
            'start_time'=>$start_time,
            'CourseNames'=>$CourseNames,

        ]);
    }
}
