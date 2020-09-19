<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['message' => 'Wrong credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'Server cannot creates token'], 500);
        }

        return response()->json(compact('token'));
    }
}
