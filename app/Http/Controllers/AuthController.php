<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register (Request $request){
        $validated = $request->validate([
            'email' => 'required|email|unique::users',
            'password' => 'required|min:8',
            'name' => 'required'
        ]);

        $user = User::create([
            "name" => $request["name"],
            "email" => $request["email"],
            "password" => \Hash::make($request["password"])
        ]);

        return response()->json(['message' => 'Register success']);
    }
}
