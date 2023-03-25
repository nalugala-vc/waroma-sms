<?php

namespace App\Http\Controllers;

use App\Authors;
use App\Books;
use App\Genre;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LibraryController extends Controller
{
    public function addGenre(){
        $data=request()->validate([
            'name'=>'required',
        ]);

        $genre=Genre::create($data);

        return response()->json([
            'status'=>true,
            'message'=>'Genre added successfully',
            'data'=>$genre
        ],201);
    }

    public function deleteGenre($genre){
       

        $genre=Genre::findOrFail($genre);

        $genre->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Genre delete successfully',
            'data'=>$genre
        ],200);
       
    }

    public function viewGenres()
    {
       $genre= Genre::all();

       return response()->json([
        'status'=>true,
        'data'=>$genre
    ],200);

    }

    public function addAuthor(){
        $data=request()->validate([
            'genre_id'=>'required',
            'name'=>'required'
        ]);

        $author=Authors::create($data);

        return response()->json([
            'status'=>true,
            'message'=>'Author added successfully',
            'data'=>$author
        ],201);
    }

    public function deleteAuthor($author){
        $author=Authors::findOrFail($author);

        $author->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Author deleted successfully',
            'data'=>$author
        ],200); 
    }

    public function updateAuthor($author)
    {
       $author= Authors::where('id',$author)->update([
            'genre_id'=>request()->genre_id,
            'name'=>request()->name,
        ]);

        return response()->json([
            'status'=>true,
            'message'=>'Author updated successfully',
            'data'=>$author
        ],201); 
    }

    public function viewAuthors()
    {
        $author=Authors::all();

        return response()->json([
            'status'=>true,
            'data'=>$author
        ],200); 
    }

    public function addBook(){
        $data=request()->validate([
            'genre_id'=>'required',
            'author_id'=>'required',
            'title'=>'required',
            'bookCover'=>'required',
            'pdf'=>'required',
        ]);

        $bookName=request()->file('bookCover')->store('assets','public');

        $pdfName=request()->file('pdf')->store('assets','public');

        $book=Books::create([
            'genre_id'=>request()->genre_id,
            'author_id'=>request()->author_id,
            'title'=>request()->title,
            'bookCover'=>$bookName,
            'pdf'=>$pdfName,
        ]);

        
        $result=request()->file('bookCover');



        return response()->json([
            'status'=>true,
            'message'=>'Genre added successfully',
            'data'=>$book
        ],201);
    }

    public function deleteBook($book){
        $book=Books::findOrFail($book);

        $book->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Genre delete successfully',
            'data'=>$book
        ],200);
    }

    public function updateBook($book)
    {
        $bookName=request()->file('bookCover')->store('assets','public');
        $pdfName=request()->file('pdf')->store('assets','public');

        $book=Books::where('id',$book)->update([
            'genre_id'=>request()->genre_id,
            'author_id'=>request()->author_id,
            'title'=>request()->title,
            'bookCover'=>$bookName,
            'pdf'=>$pdfName,
        ]);
        

        return response()->json([
            'status'=>true,
            'message'=>'Genre updated successfully',
            'data'=>$book
        ],201);
    }

    public function viewBooks()
    {
        $book=Books::all();

        return response()->json([
            'status'=>true,
            'data'=>$book
        ],200);

    }

    function showGenre()
    {
        $genre=Genre::all();
        $admin=auth('admins')->user();

        return view('Library.viewGenres',[
            'genre'=>$genre,
            'admin'=>$admin
        ]);

    }

    public function addAuthorView()
    {
        $genre=Genre::all();
        $admin=auth('admins')->user();

        return view('Library.addAuthors',[
            'genre'=>$genre,
            'admin'=>$admin
        ]);
    }

    public function viewAuthorsView()
    {
        $author=Authors::all();
        $admin=auth('admins')->user();

        return view('Library.viewAuthors',[
            'author'=>$author,
            'admin'=>$admin
        ]);
    }

    public function editAuthorView($author){
        $author=Authors::findOrFail($author);
        $genre=Genre::all();
        $admin=auth('admins')->user();

        return view('Library.editAuthor',[
            'author'=>$author,
            'genre'=>$genre,
            'admin'=>$admin
        ]);

    }

    public function addBookView(){
        $genre=Genre::all();
        $author=Authors::all();
        $admin=auth('admins')->user();

        return view('Library.addBook',[
            'genre'=>$genre,
            'author'=>$author,
            'admin'=>$admin
        ]);
    }

    public function editBookView($book)
    {
        $genre=Genre::all();
        $author=Authors::all();
        $admin=auth('admins')->user();

        $book=Books::findOrFail($book);


        return view('Library.editBook',[
            'genre'=>$genre,
            'author'=>$author,
            'book'=>$book,
            'admin'=>$admin
        ]);
    }

    public function viewBookView()
    {
        $book=Books::all();
        $admin=auth('admins')->user();
        
        
        return view('Library.viewBooks',[
            'book'=>$book,
            'admin'=>$admin
        ]);

    }
}
