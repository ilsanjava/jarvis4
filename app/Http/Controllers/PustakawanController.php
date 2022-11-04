<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PustakawanController extends Controller
{
    function index()
     {
        $data = [
            "name" => "Ihsan",
            "gander" => "L",
            "Shift" => "malam",
        ];
        return response()->json($data);
    }
}
