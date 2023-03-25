<?php

namespace App\Http\Controllers;

use App\Admins;
use App\Applications;
use App\Course;
use App\Courseadmin;
use App\cutoff;
use App\Faculty;
use App\Feestructure;
use App\Lecturer;
use App\Mail\AcceptanceMail;
use App\Schedule;
use App\Student;
use App\Unit;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(){
        $applicationsCount=DB::table('applications')->get();
        $studentsCount=DB::table('students')->get();
        $lecturerCount=DB::table('lecturers')->get();
        $coursesCount=DB::table('courses')->get();
        $countApp=$applicationsCount->count();
        $countStud=$studentsCount->count();
        $countLec=$lecturerCount->count();
        $countCourse=$coursesCount->count();

        
        $admin=auth('admins')->user();
        $applications=DB::table('applications')->get();
        $students=DB::table('students')->orderBy('created_at', 'ASC')->get();
        return view('Admins.home',[
            'applications'=>$applications,
            'students'=>$students,
            'admin'=>$admin,
        ])->with('countApp',$countApp)->with('countStud',$countStud)->with('countLec',$countLec)->with('countCourse',$countCourse);
    }

    public function students(){
        $admin=auth('admins')->user();
        
        $course=DB::table('courses')->get();

        return view('Admins.students',[
            'course'=>$course,
            'admin'=>$admin,
        ]);
    }

    public function viewStudents(){
        $admin=auth('admins')->user();
        $students=DB::table('students')->get();
        $course=DB::table('courses')->get();

        return view('Admins.viewStudents',[
            'course'=>$course,
            'students'=>$students,
            'admin'=>$admin,
        ]);
    }

    public function viewLecturers(){
        $admin=auth('admins')->user();
        $lecturers=DB::table('lecturers')->get();

        return view('Admins.viewLecturers',[
            'lecturers'=>$lecturers,
            'admin'=>$admin,
        ]);
    }

    public function editStudent($students){
        $admin=auth('admins')->user();
        $students=Student::find($students);

       
        $course=DB::table('courses')->get();

        return view('Admins.editStudents',[
            'course'=>$course,
            'admin'=>$admin,
        ])->with('students',$students);
    }

    public function editLecturers($lecturer){
        $admin=auth('admins')->user();
        $lecturer=Lecturer::find($lecturer);

       
        $course=DB::table('courses')->get();

        return view('Admins.editLecturers',[
            'course'=>$course,
            'admin'=>$admin
        ])->with('lecturer',$lecturer);
    }

    public function updateStudents(Request $request,$students){
        
        $file=request()->picture;
        $filename=time().'.'.$file->getClientOriginalExtension();
        request()->picture->move('assets',$filename);
        Student::where('id',$students)->update([
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
        return redirect()->back()->with('application','Student updated  successfully');
        

    }
    public function deleteStudent($students){
        $students=Student::find($students);

        $students->delete();

        return redirect()->back();

    }

    public function lecturers(){
        $admin=auth('admins')->user();
        return view('Admins.lecturers',[
            'admin'=>$admin
        ]);
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

        redirect()->back()->with('application','Lecturer updated  successfully');

    }

    public function addLecturerUnits(){
        $admin=auth('admins')->user();
        $units=DB::table('units')->get();
        $lecturer=DB::table('lecturers')->get();


        return view('Admins.assignUnits',[
            'units'=>$units,
            'lecturer'=>$lecturer,
            'admin'=>$admin
        ]);
    }

    public function assign(){
        $data=request()->validate([
            'lecturer_id'=>'required',
            'units_id'=>'required',
        ]);

        \App\LecturerUnits::create($data);

        return redirect()->back()->with('application','Unit assigned successfully');
    }

    public function applications(){
        $applications=DB::table('applications')->get();
        $admin=auth('admins')->user();

        return View('Admins.applications',[
            'applications'=>$applications,
            'admin'=>$admin
        ]);


    }

    public function registerStudents(Request $request){
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'picture' => ['required'],
            'course_id' => ['required', 'integer', 'max:255'],
            'year' => ['required', 'integer', 'max:255'],
            'semester' => ['required', 'integer', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'parent_name' => ['required', 'string', 'max:255'],
            'parent_email' => ['required', 'string', 'email', 'max:255'],
            'parent_number' => ['required', 'string', 'max:255'],
            'home_location' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $name=$request['name'];
        $email=$request['email'];
        $password=$request['password'];

        $file=request()->picture;
        $filename=time().'.'.$file->getClientOriginalExtension();
        request()->picture->move('assets',$filename);
        Student::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'course_id' => $request['course_id'],
            'year' => $request['year'],
            'semester' => $request['semester'],
            'picture'=>$filename,
            'phone_number' => $request['phone_number'],
            'gender' => $request['gender'],
            'parent_name' => $request['parent_name'],
            'parent_email' => $request['parent_email'],
            'parent_number' => $request['parent_number'],
            'home_location' => $request['home_location'],
            'password' => Hash::make($request['password']),
        ]);

        Mail::to(request()->email)->send(new AcceptanceMail($name,$password,$email));

        return redirect()->back()->with('application','Student added successfully'); 
    }

    public function studentApp(){

        function getRandomWord() {
            $len = 10;
            $word = array_merge(range('a', 'z'), range('A', 'Z'));
            shuffle($word);
            return substr(implode($word), 0, $len);
        }

       request()->validate([
            'id'=>'required',
            'course_id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'phone_number'=>'required',
            'picture'=>'required',
            'year'=>'required',
            'semester'=>'required',
            'gender'=>'required',
            'parent_name'=>'required',
            'parent_email'=>'required',
            'parent_number'=>'required',
            'home_location'=>'required',
            
        ]);

        $password=getRandomWord();

        \App\Student::create([
            'course_id'=>request()->course_id,
            'semester'=>request()->semester,
            'name'=>request()->name,
            'email'=>request()->email,
            'phone_number'=>request()->phone_number,
            'picture'=>request()->picture,
            'year'=>request()->year,
            'gender'=>request()->gender,
            'parent_name'=>request()->parent_name,
            'parent_email'=>request()->parent_email,
            'parent_number'=>request()->parent_number,
            'home_location'=>request()->home_location,
            'password' => Hash::make($password),
        ]);

        $appication_id=request()->id;
        $name=request()->name;
        $email=request()->email;

        DB::table('applications')->delete($appication_id);

        Mail::to(request()->email)->send(new AcceptanceMail($name,$password,$email));

        return  redirect()->back()->with('application','Student registered successfully');



    }

    public function Courses(){
        $admin=auth('admins')->user();
        $faculty=DB::table('faculties')->get();
        $course_admin=Courseadmin::all();

        return view('Admins.addCourses',[
            'faculty'=>$faculty,
            'course_admin'=>$course_admin,
            'admin'=>$admin
        ]);
    }

    public function addCourse(){
        $data=request()->validate([
            'name'=>'required',
            'shortName'=>'required',
            'faculty_id'=>'required',
            'course_admin_id'=>'required',
            'number_of_years'=>'required',
        ]);

        \App\Course::create($data);
        return redirect()->back()->with('application','course added successfully');
    }

    public function viewCourses(){
        $courses=Course::all();
        $admin=auth('admins')->user();


       
        return view('Admins.courses',[
            'courses'=>$courses,
            'admin'=>$admin
        ]);

    }

    public function editCourses($course){
        $courses=Course::findOrFail($course);
        $admin=auth('admins')->user();
        $faculty=DB::table('faculties')->get();
        $course_admin=Courseadmin::all();

        return view('Admins.editCourses',[
            'courses'=>$courses,
            'faculty'=>$faculty,
            'course_admin'=>$course_admin,
            'admin'=>$admin
        ]);
    }

    public function deleteCourse($course){
        $course=Course::findOrFail($course);

        $course->delete();

        return redirect()->back()->with('application','Course deleted successfully');

        
    }

    public function updateCourse($course){
        Course::where('id',$course)->update([
            'name'=>request()->name,
            'shortName'=>request()->shortName,
            'faculty_id'=>request()->faculty_id,
            'course_admin_id'=>request()->course_admin_id,
            'number_of_years'=>request()->number_of_years,
        ]);
        return redirect()->back()->with('application','Course updated  successfully');

    }

    public function cutOff(){
        $admin=auth('admins')->user();
        $Cuttoff=DB::table('cutoffs')->get();
        $Course=DB::table('courses')->get('id');

        $arrayCuttoff=[];
        $arrayCourse=[];
        $cutoff=[];

        foreach ($Cuttoff as $Cuttoff){
            array_push($arrayCuttoff,$Cuttoff->course_id);
        }

        foreach ($Course as $Course){
            array_push($arrayCourse,$Course->id);
        }

        $noCuttoff=array_diff($arrayCourse,$arrayCuttoff);

        foreach ($noCuttoff as $noCuttoff){
            $cut=DB::table('courses')->where('id',$noCuttoff)->get()->first();
            array_push($cutoff,$cut);

       }


        return view('Admins.addCuttoffPoints',[
            'cutoff'=>$cutoff,
            'admin'=>$admin
        ]);
    }

    public function addCutoff(){
        $data=request()->validate([
            'course_id'=>'required',
            'cutoff'=>'required',
        ]);

        cutoff::create($data);

        return redirect()->back()->with('application','Cutoff point added successfully');

    }

    public function viewCutoff(){
        $cutoff=cutoff::all();
        $admin=auth('admins')->user();

        return view('Admins.viewCuttofPoints',[
            'cutoff'=>$cutoff,
            'admin'=>$admin
        ]);

    }

    public function editCutoff($cutoff){
        $cutoff=cutoff::findOrFail($cutoff);
        $allCutoff=cutoff::all();
        $admin=auth('admins')->user();

        return view('Admins.editCuttoffPoints',[
            'cutoff'=>$cutoff,
            'allCutoff'=>$allCutoff,
            'admin'=>$admin
        ]);
    }

    public function updateCutoff($cutoff){

        cutoff::where('id',$cutoff)->update([
            'cutoff'=>request()->cutoff
        ]);
        return redirect()->back()->with('application','Cutoff Points updated  successfully');
    }

    public function deleteCutoff($cutoff){
        $cutoff=cutoff::findOrFail($cutoff);

        $cutoff->delete();

        return redirect()->back()->with('application','Cutoff Point deleted successfully');

    }

    public function faculty(){
        $admin=auth('admins')->user();
        return view('Admins.addFacuties',[
            'admin'=>$admin
        ]);
    }

    public function addFaculty(){
        $data=request()->validate([
            'name'=>'required',
            'short_name'=>'required',
        ]);

        Faculty::create($data);

        return redirect()->back()->with('application','Faculty added successfully');
    }

    public function viewFaculty(){
        $faculty=Faculty::all();
        $admin=auth('admins')->user();

        return view('Admins.viewFaculties',[
            'faculty'=>$faculty,
            'admin'=>$admin
        ]);

    }

    public function editFaculty($faculty){
        $faculty=Faculty::findOrFail($faculty);
        $admin=auth('admins')->user();

        return view('Admins.editFacutlies',[
            'faculty'=>$faculty,
            'admin'=>$admin
        ]);
    }

    public function updateFaculty($faculty){
        Faculty::where('id',$faculty)->update([
            'name'=>request()->name,
            'short_name'=>request()->short_name,
        ]);
        return redirect()->back()->with('application','Faculty updated  successfully');

    }

    public function deleteFaculty($faculty){
        $faculty=Faculty::findOrFail($faculty);

        $faculty->delete();

        return redirect()->back()->with('application','Faculty deleted successfully');
    }

    public function feeStructure(){
        $course=Course::all();
        $admin=auth('admins')->user();
        return view('Admins.addFeeStructure',[
            'course'=>$course,
            'admin'=>$admin
        ]);
    }
    
    public function addFeeStructure(){
        $data=request()->validate([
            'course_id'=>'required',
            'year'=>'required',
            'semister'=>'required',
            'Full_amount'=>'required',
            'half_deposit'=>'required',
            'Due_Date'=>'required',
            'first_instalment'=>'required',
            'Due_Date_2'=>'required',
            'second_instalment'=>'required',
            'Due_Date_3'=>'required',
        ]);

        Feestructure::create($data);

        return redirect()->back()->with('application','FeeStructure added successfully');


    }

    public function viewFeeStructure(){
        $fee=Feestructure::all();
        $admin=auth('admins')->user();

        return view('Admins.viewFeeStructure',[
            'fee'=>$fee,
            'admin'=>$admin
        ]);
    }

    public function editFeeStructure($fee){
        $fee=Feestructure::findOrFail($fee);

        return view('Admins.editFeeStructure',[
            'fee'=>$fee,
        ]);
    }

    public function updateFeeStructure($fee){

        Feestructure::where('id',$fee)->update([
            'year'=>request()->year,
            'semister'=>request()->semister,
            'Full_amount'=>request()->Full_amount,
            'half_deposit'=>request()->half_deposit,
            'Due_Date'=>request()->Due_Date,
            'first_instalment'=>request()->first_instalment,
            'Due_Date_2'=>request()->Due_Date_2,
            'second_instalment'=>request()->second_instalment,
            'Due_Date_3'=>request()->Due_Date_3,
        ]);

        return redirect()->back()->with('application','FeeStructure updated successfully');

    }

    public function deleteFeeStructure($fee){
        $fee=Feestructure::findOrFail($fee);

        $fee->delete();

        return redirect()->back()->with('application','FeeStructure deleted successfully');

    }

    public function schedule(){
        $course=Course::all();
        $unit=Unit::all();
        $lecturer=Lecturer::all();
        $admin=auth('admins')->user();

        return view('Admins.addSchedule',[
            'course'=>$course,
            'unit'=>$unit,
            'lecturer'=>$lecturer,
            'admin'=>$admin
        ]);
    }

    public function addSchedule(){
        $data=request()->validate([
            'courses_id'=>'required',
            'year'=>'required',
            'semister'=>'required',
            'day'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'units_id'=>'required',
            'lecturers_id'=>'required',
            'equipments'=>'required',
        ]);

        Schedule::create($data);

        return redirect()->back()->with('application','Schedule added successfully');
    }

    public function viewSchedule(){
        $schedule=Schedule::all();

        return view('Admins.viewSchedule',[
            'schedule'=>$schedule,
        ]);
    }

    public function editSchedule($schedule){
        $schedule=Schedule::findOrFail($schedule);
        $course=Course::all();
        $unit=Unit::all();
        $lecturer=Lecturer::all();
        $admin=auth('admins')->user();

        return view('Admins.editSchedule',[
            'schedule'=>$schedule,
            'course'=>$course,
            'unit'=>$unit,
            'lecturer'=>$lecturer,
            'admin'=>$admin
        ]);
    }

    public function updateSchedule($schedule){
        Schedule::where('id',$schedule)->update([
            'year'=>request()->year,
            'semister'=>request()->semister,
            'day'=>request()->day,
            'start_time'=>request()->start_time,
            'end_time'=>request()->end_time,
            'units_id'=>request()->units_id,
            'lecturers_id'=>request()->lecturers_id,
            'equipments'=>request()->equipments,
        ]);

        
        return redirect()->back()->with('application','Schedule updated successfully');

    }
    
    public function deleteSchedule($schedule){
        $schedule=Schedule::findOrFail($schedule);

        $schedule->delete();

        return redirect()->back()->with('application','Schedule deleted successfully');

    }

    public function units(){
        $course=Course::all();
        $admin=auth('admins')->user();

        return view('Admins.addUnits',[
            'course'=>$course,
            'admin'=>$admin
        ]);
    }

    public function addUnits(){
        $data=request()->validate([
            'name'=>'required',
            'course_id'=>'required',
            'code'=>'required',
            'year'=>'required',
            'semester'=>'required',
            'credits'=>'required',
        ]);

        Unit::create($data);

        return redirect()->back()->with('application','Unit added successfully');

    } 

    public function viewUnits(){
        $unit=Unit::all();
        $admin=auth('admins')->user();

        return view('Admins.viewUnits',[
            'unit'=>$unit,
            'admin'=>$admin
        ]);
    }

    public function editUnits($unit){
        $unit=Unit::findOrFail($unit);
        $course=Course::all();
        $admin=auth('admins')->user();

        return view('Admins.editUnits',[
            'unit'=>$unit,
            'course'=>$course,
            'admin'=>$admin
        ]);
    }

    public function updateUnits($unit){
        Unit::where('id',$unit)->update([
            'name'=>request()->name,
            'course_id'=>request()->course_id,
            'code'=>request()->code,
            'year'=>request()->year,
            'semester'=>request()->semester,
            'credits'=>request()->credits,
        ]);

        return redirect()->back()->with('application','Unit updated successfully');
    }

    public function deleteUnits($unit){
        $unit=Unit::findOrFail($unit);

        $unit->delete();

        return redirect()->back()->with('application','Unit deleted successfully');
    }

}
