<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserCredential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $userCredential = UserCredential::where('username', $credentials['username'])->first();

        if (!$userCredential || !Hash::check($credentials['password'], $userCredential->password)) {
            throw ValidationException::withMessages(['message' => 'Invalid credentials']);
        }

        $user = $userCredential->user;

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['token' => $token]);
    }

    public function logout(Request $request)
    {
        $user = $request->user(); // Make sure $user is an instance of User model
        $user->tokens()->delete(); // Correct usage of tokens() method

        return response()->json(['message' => 'Logged out successfully']);
    }
}
