<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        try{
            $request->validate([
                'name' =>'required|string',
                'lastname' =>'required|string',
                'email' =>'required|string',
                'username' =>'required|string',
                'password' =>'required|string',
            ]);

            User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => 2,
            ]);

            return response()->json([
               'message' =>'Usuario creado exitosamente'
            ],201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
