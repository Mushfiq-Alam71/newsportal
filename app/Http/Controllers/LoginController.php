<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Retrieve the user by email
        $user = User::where('email', $request->input('email'))->first();

        if ($user && $request->input('password') == $user->password) {
            return redirect()->route('home');
        }

        echo "wrong password";
        // return redirect()->route('login')->with('error', 'Invalid email or password');
    }
}