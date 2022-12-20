<?php

namespace App\Http\Controllers;

use App\Lecturer;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('Admins.home');
    }

    public function students(){
        
        $course=DB::table('courses')->get();

        return view('Admins.students',[
            'course'=>$course
        ]);
    }

    public function viewStudents(){

        $students=DB::table('students')->get();
        $course=DB::table('courses')->get();

        return view('Admins.viewStudents',[
            'course'=>$course,
            'students'=>$students,
        ]);
    }

    public function viewLecturers(){

        $lecturers=DB::table('lecturers')->get();

        return view('Admins.viewLecturers',[
            'lecturers'=>$lecturers,
        ]);
    }

    public function editStudent($students){
        $students=Student::find($students);

       
        $course=DB::table('courses')->get();

        return view('Admins.editStudents',[
            'course'=>$course,
        ])->with('students',$students);
    }

    public function editLecturers($lecturer){
        $lecturer=Lecturer::find($lecturer);

       
        $course=DB::table('courses')->get();

        return view('Admins.editLecturers',[
            'course'=>$course,
        ])->with('lecturer',$lecturer);
    }

    public function updateStudents(Request $request,$students){

        $file=request()->picture;
        $filename=time().'.'.$file->getClientOriginalExtension();
        request()->picture->move('assets',$filename);
        return Student::where('id',$students)->update([
            'name' => $request->name,
            'email' => $request->email,
            'course_id' => $request->course_id,
            'year' => $request->year,
            'semester' => $request->semester,
            'picture'=>$filename,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'parent_name' => $request->parent_name,
            'parent_email' => $request->parent_email,
            'parent_number' => $request->parent_number,
            'home_location' => $request->home_location,
        ]);

    }
    public function deleteStudent($students){
        $students=Student::find($students);

        $students->delete();

        return redirect()->back();

    }

    public function lecturers(){
        return view('Admins.lecturers');
    }

    public function addLecturer(){
        // dd(request()->all());
        
        request()->validate([
            'email' => 'required|email|unique:lecturers',
            'password' => 'required|min:6|confirmed',
            'profile_pic' => 'required|image',
            'name' => 'required',
            'phone_number' => 'required',
            'gender' => 'required',
        ]);

        $file=request()->profile_pic;
        $filename=time().'.'.$file->getClientOriginalExtension();
        request()->profile_pic->move('assets',$filename);

         Lecturer::create([
            'name' => request()->name,
            'email' => request()->email,
            'profile_pic'=>$filename,
            'phone_number' => request()->phone_number,
            'gender' => request()->gender,
            'password' => Hash::make(request()->password),
        ]);

        return redirect()->back();

    }

    public function deleteLecturer($lecturer){
        $lecturer=Lecturer::find($lecturer);

        $lecturer->delete();

        return redirect()->back();

    }

    public function updateLecturer(Request $request,$lecturer){

        $file=request()->profile_pic;
        $filename=time().'.'.$file->getClientOriginalExtension();
        request()->profile_pic->move('assets',$filename);
        Lecturer::where('id',$lecturer)->update([
            'name' => $request->name,
            'email' => $request->email,
            'profile_pic'=>$filename,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
        ]);

        return redirect()->back();

    }

    public function addLecturerUnits(){
        $units=DB::table('units')->get();
        $lecturer=DB::table('lecturers')->get();


        return view('Admins.assignUnits',[
            'units'=>$units,
            'lecturer'=>$lecturer,
        ]);
    }

    public function assign(){
        $data=request()->validate([
            'lecturer_id'=>'required',
            'units_id'=>'required',
        ]);

        \App\LecturerUnits::create($data);

        return redirect()->back()->with("<script> alert('Unit assigned successfully'</script>");
    }
}
