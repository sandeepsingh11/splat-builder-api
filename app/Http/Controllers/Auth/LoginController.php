<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        // sign in user
        if (!Auth::attempt($request->only('username', 'password') /*, $request->remember*/)) {
            $body = [
                'message' => 'Incorrect credentials'
            ];

            return response($body, 401);
        }

        // // prep user data to send over
        $user = Auth::user();
        
        $userData = [
            'username' => $user->username,
            'email' => $user->email,
            'createdAt' => $user->created_at
        ];
        
        return [
            'message' => 'Logging in',
            'data' => [
                'user' => $userData
            ]
        ];
    }
}
