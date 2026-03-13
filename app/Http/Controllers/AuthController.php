<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(StoreUserRequest $request)
    {
        // return "api";
        $user = User::create($request->validated());
        $token = $user->createToken($request->name);
        return response()->json([
            'success' => true,
            'message' => 'user has been register',
            'token' => $token->plainTextToken
        ]);
    }
    public function login(LoginUserRequest $request)
    {
        // return $request;
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'password is wrong',
            ]);
        }
        $token = $user->createToken($user->name);
        return response()->json([
            'success' => true,
            'message' => 'user has been login',
            'token' => $token->plainTextToken
        ]);

    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'success' => true,
            'message' => 'user has been logout',
        ]);
    }
}


// {
//     "name": "Younes Rajix",
//     "email": "rajix@gmail.com",
//     "password": "rajix@gmail.com",
//     "password_confirmation": "rajix@gmail.com"
// }