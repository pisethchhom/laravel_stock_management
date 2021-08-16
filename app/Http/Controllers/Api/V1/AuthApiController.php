<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Models\User;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $token = Auth::user()->createToken('authToken')->accessToken;

        return response()->json([
                'user' => Auth::user(),
                'access_token' => $token,
                'token_type' => 'Bearer',
        ]);
    }
}
