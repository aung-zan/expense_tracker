<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display the login form.
     */
    public function loginForm()
    {
        return view('authentication.login');
    }

    /**
     * Authenticating credentials with default guard.
     */
    public function login(LoginRequest $request)
    {
        $credentails = $request->validated();

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

    /**
     * Logout.
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
