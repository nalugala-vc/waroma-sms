<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\AdminController;
use App\Providers\RouteServiceProvider;


Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', function () {
    return view('landingpage');
});


Route::prefix('Library')->group(function(){
    Route::get('/genre',function(){
        return view('Library.addGenre');
    });

    Route::get('viewGenres','LibraryController@showGenre');
    Route::get('addAuthors','LibraryController@addAuthorView');

    Route::get('viewAuthors','LibraryController@viewAuthorsView');

    Route::get('editAuthors/{author}','LibraryController@editAuthorView');

    Route::get('addBook','LibraryController@addBookView');

    Route::get('viewBooks','LibraryController@viewBookView');

    Route::get('editBook/{book}','LibraryController@editBookView');
});

Route::get('/logout','StudentsController@logout');


Route::get('/library','StudentsController@library');

Route::post('/student/login','StudentsController@login');


Route::get('/applications', 'ApplicationsController@index')->name('applications');

Route::post('/applications/submit', 'ApplicationsController@submit')->name('applications.submit');

Route::get('/discussionForum',function(){
    return view('students.discussionForum');
});

Route::get('/home', 'StudentsController@index')->name('home');

Route::get('/attendance','StudentsController@show')->name('attendance');

Route::get('/studentClass/{class}','StudentsController@classes')->name('classes');

Route::get('/assignments/{class}/{assignment}','StudentsController@assignments')->name('assignments');

Route::get('/viewStudents/{assignment}','StudentsController@view')->name('view.assignments');

Route::get('/viewAttendance/{unit}','StudentsController@attendance')->name('view.attendance');

Route::get('/unitmarks/{unit}','StudentsController@unitmarks')->name('view.unitmarks');

Route::get('/coursework','StudentsController@coursework')->name('view.coursework');

Route::get('/units','UnitsController@show')->name('units.show');

Route::post('/units','UnitsController@store')->name('units.store');

Route::get('/fees','FeeController@index')->name('fees');

Route::get('/feesstucture','FeeController@show')->name('fees.show');

Route::get('/class/create','AddClassController@create')->name('class.create');

Route::post('/class','AddClassController@store')->name('class.store');

Route::get('/class/{class}','AddClassController@show')->name('class.show');

Route::get('/students/{class}','AddClassController@students')->name('class.students');

Route::get('/attendance/{class}','AddClassController@attendance')->name('class.attendance');

Route::post('/attendance','AttendanceController@store')->name('attendance.store');

Route::get('/editAttendance/{class}','AttendanceController@edit')->name('attendance.edit');

Route::post('/updateAttendance','AttendanceController@updated')->name('attendance.update');

Route::get('/marks/{class}','AddmarksController@create')->name('marks.create');

Route::get('/marksEdit/{class}','AddmarksController@edit')->name('marks.edit');

Route::post('/marksUpdate','AddmarksController@updated')->name('marks.updated');

Route::post('/marks','AddmarksController@store')->name('marks.store');

Route::get('/work/{class}','AddworkController@create')->name('work.create');

Route::post('/work','AddworkController@store')->name('work.store');

Route::get('/showWork/{class}/{assignment}','AddworkController@show')->name('work.show');

Route::get('/enrolment','StudentsController@enrol');

Route::get('/downloadBook/{book}','AddworkController@downloadBook');

Route::get('/viewBook/{book}','AddworkController@viewBook');

Route::get('/download/{assignment}','AddworkController@download')->name('work.download');

Route::get('/view/{assignment}','AddworkController@view')->name('work.view');

Route::prefix('lecturer')->group(function(){
    Route::get('/loginForm','Auth\LecturerLoginController@showLoginForm');
    Route::post('/login','Auth\LecturerLoginController@login')->name('lec.login.submit');

    Route::get('/home', 'LecturerController@index')->name('lec.show');
});

Route::prefix('Admin')->group(function(){
    Route::get('/login','Auth\adminLoginController@showLoginForm');

    Route::post('/login','Auth\adminLoginController@login')->name('admin.login.submit');

    Route::get('/home','AdminController@index')->name('admin');

    Route::post('/registerStudents','AdminController@registerStudents');

    Route::get('/students','AdminController@students')->name('admin.students');

    Route::get('/lecturers','AdminController@lecturers')->name('admin.lecturers');

    Route::get('/viewStudents','AdminController@viewStudents')->name('admin.viewStudents');

    Route::get('/viewLecturers','AdminController@viewLecturers')->name('admin.viewLecturers');

    Route::get('/editStudent/{student}','AdminController@editStudent')->name('admin.editStudent');

    Route::get('/editLecturer/{lecturer}','AdminController@editLecturers')->name('admin.editLecturers');

    Route::put('/updateStudents/{student}','AdminController@updateStudents')->name('admin.updateStudents');

    Route::put('/updateLecturer/{lecturer}','AdminController@updateLecturer')->name('admin.updateLecturer');

    Route::delete('/deleteStudent/{student}','AdminController@deleteStudent')->name('admin.deleteStudent');

    Route::delete('/deleteLecturer/{lecturer}','AdminController@deleteLecturer')->name('admin.deleteLecturer');


    Route::post('/addLec','AdminController@addLecturer')->name('admin.addLecturer');

    Route::get('/addLecturerUnits','AdminController@addLecturerUnits')->name('admin.addLecturerUnits');

    Route::post('/assign','AdminController@assign')->name('admin.assign');

    Route::get('/applications','AdminController@applications')->name('admin.appications');

    Route::post('/applications/accept','AdminController@studentApp')->name('admin.appicationAccept');

    Route::get('/courses','AdminController@Courses')->name('admin.courses');

    Route::post('/addCourses','AdminController@addCourse')->name('admin.addCourses');

    Route::get('/viewCourses','AdminController@viewCourses')->name('admin.viewCourses');

    Route::get('/editCourses/{course}','AdminController@editCourses')->name('admin.editCourses');

    Route::put('/updateCourse/{course}','AdminController@updateCourse')->name('admin.updateCourse');

    Route::delete('/deleteCourse/{course}','AdminController@deleteCourse')->name('admin.deleteCourse');

    Route::get('/cutOff','AdminController@cutoff')->name('admin.cutoff');

    Route::post('/addCutoff','AdminController@addCutoff')->name('admin.addCutoff');

    Route::get('/editCutoff/{cutoff}','AdminController@editCutoff')->name('admin.editCutoff');

    Route::get('/viewCutoffs','AdminController@viewCutoff')->name('admin.viewCutoff');

    Route::put('/updateCutoff/{cutoff}','AdminController@updateCutoff')->name('admin.updateCutoff');

    Route::delete('/deleteCutoff/{Cutoff}','AdminController@deleteCutoff')->name('admin.deleteCutoff');

    Route::get('/faculty','AdminController@faculty')->name('admin.faculty');

    Route::post('/addFaculty','AdminController@addFaculty')->name('admin.addFaculty');

    Route::get('/viewFaculty','AdminController@viewFaculty')->name('admin.viewFaculty');

    Route::get('/editFaculty/{faculty}','AdminController@editFaculty')->name('admin.editFaculty');

    Route::put('/updateFaculty/{faculty}','AdminController@updateFaculty')->name('admin.updateFaculty');

    Route::delete('/deleteFaculty/{faculty}','AdminController@deleteFaculty')->name('admin.deleteFaculty');

    Route::get('/feeStructure','AdminController@feeStructure')->name('admin.fees');

    Route::post('/addFeeStructure','AdminController@addFeeStructure')->name('admin.addFee');

    Route::get('/viewFeeStructure','AdminController@viewFeeStructure')->name('admin.viewFee');

    Route::get('/editFeeStructure/{fee}','AdminController@editFeeStructure')->name('admin.editFeeStructure');

    Route::put('/updateFeeStructure/{fee}','AdminController@updateFeeStructure')->name('admin.updateFeeStructure');

    Route::delete('/deleteFeeStructure/{fee}','AdminController@deleteFeeStructure')->name('admin.deleteFeeStructure');

    Route::get('/schedule','AdminController@schedule')->name('admin.schedule');

    Route::post('/addSchedule','AdminController@addSchedule')->name('admin.addschedule');

    Route::get('/viewSchedule','AdminController@viewSchedule')->name('admin.viewschedule');

    Route::get('/editSchedule/{schedule}','AdminController@editSchedule')->name('admin.editSchedule');

    Route::put('/updateSchedule/{schedule}','AdminController@updateSchedule')->name('admin.updateSchedule');

    Route::delete('/deleteSchedule/{schedule}','AdminController@deleteSchedule')->name('admin.deleteSchedule');

    Route::get('/units','AdminController@units')->name('admin.units');

    Route::post('/addUnits','AdminController@addUnits')->name('admin.addUnits');

    Route::get('/viewUnits','AdminController@viewUnits')->name('admin.viewUnits');

    Route::get('/editUnits/{unit}','AdminController@editUnits')->name('admin.editUnits');

    Route::put('/updateUnits/{unit}','AdminController@updateUnits')->name('admin.updateUnits');

    Route::delete('/deleteUnits/{unit}','AdminController@deleteUnits')->name('admin.deleteUnits');



});

