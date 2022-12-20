<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationsController extends Controller
{
    public function index(){
    
        $course=DB::table('courses')->get();
        return view('application',[
            'course'=>$course,
        ]);
    }


    public function submit(Request $request){
        $data=request()->validate([
            'course_id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'age'=>'required',
            'phone_number'=>'required',
            'former_highschool'=>'required',
            'KCSE_Grade'=>'required',
            'KCSE_points'=>'required',
            'student_description'=>'required',
        ]);

        $cuttoff=DB::table('cutoffs')->where('course_id',$request->course_id)->first();
        
        if($request->KCSE_points<$cuttoff->cutoff){
            redirect()->back()->with('status','Sorry,You do not meet the minimum KCSE points for this course');
            return;
        }else{
            \App\Applications::create($data);
           
        }

        return  redirect()->back()->with('application','Your application has been successfully submited');
    
    }

}
