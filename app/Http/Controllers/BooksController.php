<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{
    //show all the books
    public function index(){
        $book = Books::all();
        return response($book);
    }

    //show specific books
    public function show($id){
        $book = Books::find($id);
        return response($book);
    }


    //store the given books
    public function store(Request $request)
    {
        $book=new Books();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->published_at = $request->published_at;

        $book->save();
        return response([
            "message"=>"Books added in database!!"
        ]);
    }

    //update the specific books
    public function update(Request $request)
    {
        $book = Books::find($request->id);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->published_at = $request->published_at;

        $book->update();
        return response([
            "message"=>"Updated Succesfully"
        ]);
    }

    //delete a specific books
    public function delete($id){
        $user = Books::find($id);
        if ($user == null){
            return response([
                "message"=>"Record not found"
            ],404);
        }
        else{
            $user->delete();
            return response([
                "message"=>"Deleted succesfully!"
            ],200);
        }
    }
}
