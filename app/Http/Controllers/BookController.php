<?php

namespace App\Http\Controllers;
use App\models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function index(){

        //get all data in books table
        $books = Book::all();
        // send 201 if no data
        if(count($books) == 0){
            return response()->json([
                'message' =>'Get all resources',
                'status' => 204,
            ], 204);

        }

        return response()->json([
            'message' =>'Get all resources',
            'status' => 200,
            'data' =>$books,
        ], 200);
    }

    function store(Reqquest $request)
    {

        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'rating' => 'required | numeric',
            'publish_date' => 'required \ date',
        ]);
        $created = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'rating' => $request->rating,
            'published_date' => $request->publish_date,
        ]);

        return response()->json([
            'massage' => 'Resource created sucsessfully',
            'status' => 201,
            'data' => $created,
        ], 201);
    }
    public function show($id){
       $book = Book::find($id);
       // Jika id tidak ditemukan

       if(!$book){
        return response()->json([
            'message' => 'Resource not found',
            'status' => 404,
            'date' => $book
        ], 404); 
       }
       $request->validate([
        'rating' => 'numeric',
        'publish_date' => 'required \ date',
    ]);

       //return book resoruce
       return response()->json([
        'message' => 'Get detail resource',
        'status' => 200,
        'data' => $book
       ], 200);
    }
}

function destroy($id){
    $book = Book::find{$id};
    if(!$book){
        return response()->json([
            'message' => 'Resource not found',
            'status' => 404 
        ], 404)
    }

    if($deleted) {
        return response()->json([
            'message' => 'Resource delete sucsessfully',
            'status' => 200

        ], 200);
    }
    function serc($title)
    {
     $books =  Book::where('title', 'like', '%')->get();

     if (count ($books) == 0) {
        return response() ->json([
            'message' => 'resource is empity',
            'status' => 204,
        ], 204);
     }


     return response()->json([
        'message' => 'Resource searched successfully',
        'data' => $books
        'status' => 200,
     ],200);
    }
}
