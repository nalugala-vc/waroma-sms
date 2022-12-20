<?php

namespace App\Http\Controllers;

use App\Lecturer;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LecturerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:lecturer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($lecturer)
    {
        $lecturer =Lecturer::findOrFail($lecturer);
        $students=[];
        $stude=0;
        // $students=DB::table('student_classes')->where('classes_id',$classes->id)->get();


        foreach($lecturer->classes as $class){
            $student=DB::table('student_classes')->where('classes_id',$class->id)->get()->count();
            $stude=$student+$stude;
        }
        
        return view('lecturer.home',[
            'lecturer'=>$lecturer,
            'stude'=>$stude,
        ]);
    }
}
