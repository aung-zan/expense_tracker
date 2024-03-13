<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('authentication.login');
    }

    public function login(LoginRequest $request)
    {
        $credentails = $request->except('_token');

        $result = Auth::attempt($credentails);

        if ($result) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()
            ->withInput()
            ->with('auth', 'The email and password is wrong.');
    }

    public function forgotPassword()
    {
        //
    }

    public function resetPassword()
    {
        //
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
