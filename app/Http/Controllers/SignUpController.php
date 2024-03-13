<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function signUpForm()
    {
        return view('authentication.signup');
    }

    public function signUp()
    {
        //
    }
}
