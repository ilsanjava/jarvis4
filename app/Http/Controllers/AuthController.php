<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function register(Request $request){
        $request->validate([
            'name' => 'requare',
            'email' => 'requare | email | unique:user',
            'password' => 'requare | min:4'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        return response()->json([
            'message' => 'Register sucsess',
        'data' => $user
        ]);
    }
    function login(Request $request){
        /**
         * 1. menangkap data request
         * 2. cari user berdasarkan email dari request
         * 3. badingkan pasword request dengan password dari database
         * 4. jika password sama maka login berhasil 
         */
        $user = user::where('email', $request->email)-first();

        if(!$user){
            return response()->json([
                'message' => 'login is invalid'
            ], 401);
        }

        if(Auth::attempt($request->all())){
            $token = Auth::user()->createToken('authToken');
            return response()->json([
                'message' => 'login success',
                'token' => $token->plainTextToken,
            ]);
        } else{
            return response()->json([
                'message' => 'login is invalid'
            ], 401);
        }

   
        }

}
