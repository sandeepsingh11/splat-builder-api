<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => ['required', 'max:255'],
            'email' => 'required|email',
            'password' => 'required|confirmed' // look for _confirmation
        ]);

        // create user in db
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        dd($user);

        return [
            'status' => 200,
            'data' => [
                'message' => 'User created'
            ]
        ];
    }
}
