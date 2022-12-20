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



Route::get('/', function () {
    return view('auth.login');
});



Auth::routes();

Route::get('/home/{student}', 'StudentsController@index')->name('home');

Route::get('/attendance/{student}','StudentsController@show')->name('attendace');

Route::get('/studentClass/{student}/{class}','StudentsController@classes')->name('classes');

Route::get('/assignments/{student}/{class}/{assignment}','StudentsController@assignments')->name('assignments');

Route::get('/viewStudents/{assignment}/{student}','StudentsController@view')->name('view.assignments');

Route::get('/viewAttendance/{student}/{unit}','StudentsController@attendance')->name('view.attendance');

Route::get('/unitmarks/{student}/{unit}','StudentsController@unitmarks')->name('view.unitmarks');

Route::get('/coursework/{student}','StudentsController@coursework')->name('view.coursework');

Route::get('/units/{student}','UnitsController@show')->name('units.show');

Route::post('/units','UnitsController@store')->name('units.store');

Route::get('/fees/{student}','FeeController@index')->name('fees');

Route::get('/feesstucture/{student}','FeeController@show')->name('fees.show');

Route::get('/class/create/{lecturer}','AddClassController@create')->name('class.create');

Route::post('/class','AddClassController@store')->name('class.store');

Route::get('/class/{class}/{lecturer}','AddClassController@show')->name('class.show');

Route::get('/students/{class}/{lecturer}','AddClassController@students')->name('class.students');

Route::get('/attendance/{class}/{lecturer}','AddClassController@attendance')->name('class.attendance');

Route::post('/attendance','AttendanceController@store')->name('attendance.store');

Route::get('/editAttendance/{class}/{lecturer}','AttendanceController@edit')->name('attendance.edit');

Route::post('/updateAttendance','AttendanceController@updated')->name('attendance.update');

Route::get('/marks/{class}/{lecturer}','AddmarksController@create')->name('marks.create');

Route::get('/marksEdit/{class}/{lecturer}','AddmarksController@edit')->name('marks.edit');

Route::post('/marksUpdate','AddmarksController@updated')->name('marks.updated');

Route::post('/marks','AddmarksController@store')->name('marks.store');

Route::get('/work/{class}/{lecturer}','AddworkController@create')->name('work.create');

Route::post('/work','AddworkController@store')->name('work.store');

Route::get('/showWork/{class}/{assignment}/{lecturer}','AddworkController@show')->name('work.show');

Route::get('/download/{assignment}','AddworkController@download')->name('work.download');

Route::get('/view/{assignment}/{lecturer}','AddworkController@view')->name('work.view');

Route::prefix('lecturer')->group(function(){
    Route::get('/login','Auth\LecturerLoginController@showLoginForm')->name('lec.login');
    
    Route::post('/login','Auth\LecturerLoginController@login')->name('lec.login.submit');

    Route::get('/{lecturer}', 'LecturerController@index')->name('lec.show');
});

Route::get('/Admin','AdminController@index')->name('admin');

Route::get('/Admin/students','AdminController@students')->name('admin.students');

Route::get('/Admin/lecturers','AdminController@lecturers')->name('admin.lecturers');

Route::get('/Admin/viewStudents','AdminController@viewStudents')->name('admin.viewStudents');

Route::get('/Admin/viewLecturers','AdminController@viewLecturers')->name('admin.viewLecturers');

Route::get('/Admin/editStudent/{student}','AdminController@editStudent')->name('admin.editStudent');

Route::get('/Admin/editLecturer/{lecturer}','AdminController@editLecturers')->name('admin.editLecturers');

Route::put('/Admin/updateStudents/{student}','AdminController@updateStudents')->name('admin.updateStudents');

Route::put('/Admin/updateLecturer/{lecturer}','AdminController@updateLecturer')->name('admin.updateLecturer');

Route::delete('/Admin/deleteStudent/{student}','AdminController@deleteStudent')->name('admin.deleteStudent');

Route::delete('/Admin/deleteLecturer/{lecturer}','AdminController@deleteLecturer')->name('admin.deleteLecturer');


Route::post('/Admin/addLec','AdminController@addLecturer')->name('admin.addLecturer');

Route::get('/Admin/addLecturerUnits','AdminController@addLecturerUnits')->name('admin.addLecturerUnits');

Route::post('/Admin/assign','AdminController@assign')->name('admin.assign');