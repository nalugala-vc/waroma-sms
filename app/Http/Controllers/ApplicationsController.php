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
        request()->validate([
            'course_id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'age'=>'required',
            'phone_number'=>'required',
            'former_highschool'=>'required',
            'KCSE_Grade'=>'required',
            'KCSE_points'=>'required',
            'student_description'=>'required',
            'picture'=>'required|image',
            'year'=>'required',
            'semester'=>'required',
            'gender'=>'required',
            'parent_name'=>'required',
            'parent_email'=>'required',
            'parent_no'=>'required',
            'home_location'=>'required',
            
        ]);

        $file=request()->picture;
        $filename=time().'.'.$file->getClientOriginalExtension();
        request()->picture->move('assets',$filename);

        $cuttoff=DB::table('cutoffs')->where('course_id',$request->course_id)->first();

        
        
        if($request->KCSE_points<$cuttoff->cutoff){
            redirect()->back()->with('status','Sorry,You do not meet the minimum KCSE points for this course');
            return;
        }else{
            \App\Applications::create([
                'course_id'=>request()->course_id,
                'name'=>request()->name,
                'email'=>request()->email,
                'age'=>request()->age,
                'phone_number'=>request()->phone_number,
                'former_highschool'=>request()->former_highschool,
                'KCSE_Grade'=>request()->KCSE_Grade,
                'KCSE_points'=>request()->KCSE_points,
                'student_description'=>request()->student_description,
                'picture'=>$filename,
                'year'=>request()->year,
                'semester'=>request()->semester,
                'gender'=>request()->gender,
                'parent_name'=>request()->parent_name,
                'parent_email'=>request()->parent_email,
                'parent_no'=>request()->parent_no,
                'home_location'=>request()->home_location,
            ]);
           
        }

        return  redirect()->back()->with('application','Your application has been successfully submited');
    
    }

    

}
