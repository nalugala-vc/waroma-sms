<?php

use App\Http\Controllers\LibraryController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/addGenre',[LibraryController::class,'addGenre']);

Route::delete('/deleteGenre/{genre}',[LibraryController::class,'deleteGenre']);

Route::get('/viewGenres',[LibraryController::class,'viewGenres']);

Route::post('/addAuthor',[LibraryController::class,'addAuthor']);

Route::delete('/deleteAuthor/{author}',[LibraryController::class,'deleteAuthor']);

Route::put('/updateAuthor/{author}',[LibraryController::class,'updateAuthor']);

Route::get('/viewAuthors',[LibraryController::class,'viewAuthors']);

Route::post('/addBook',[LibraryController::class,'addBook']);

Route::delete('/deleteBook/{book}',[LibraryController::class,'deleteBook']);

Route::put('/updateBook/{book}',[LibraryController::class,'updateBook']);

Route::get('/viewBooks',[LibraryController::class,'viewBooks']);


