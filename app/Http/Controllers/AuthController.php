<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            
            // Check if the user's role is 'guru' or 'admin'
            if ($user->role->role === 'guru' || $user->role->name === 'admin') {
                
                return response()->json([
                    'token_type' => 'Bearer',
                    'user' => $user,
                ]);
            }
            
            // If the user's role is not 'guru' or 'admin', logout and return an error
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => ['Only teachers and administrators are allowed to login.'],
            ]);
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}