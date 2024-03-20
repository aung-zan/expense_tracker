<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepository;
use App\Http\Requests\SignUpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function signUpForm()
    {
        return view('authentication.signup');
    }

    public function signUp(SignUpRequest $request)
    {
        $data = $request->except('_token');

        $user = $this->userRepository->createUser($data);

        Auth::loginUsingId($user->id);

        return redirect()->route('dashboard');
    }
}
