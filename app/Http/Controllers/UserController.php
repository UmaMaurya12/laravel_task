<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate input data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Return a response
        return response()->json(['message' => 'User registered successfully'], 201);
    }

 

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
 

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $tokenResult = $user->createToken('MyAppToken')->accessToken;
            $token = $tokenResult->token;
            // die($user->email);
            
            if ($request->remember_me) {
                $token->expires_at = now()->addWeeks(1); // Token expiry set to 1 week
            }
            
            $user->update([
                'remember_token' => $tokenResult->token,
            ]);

     
                  return response()->json(['message' =>  'Login Successfully','remember_token' => $tokenResult->token], 200);
            
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

  
}
