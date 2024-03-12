<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('layouts.auth');
    }

    public function login()
    {
        //
    }

    public function signup()
    {
        //
    }

    public function resetPassword()
    {
        //
    }
}
