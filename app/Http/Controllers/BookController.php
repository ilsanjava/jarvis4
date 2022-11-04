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
}
