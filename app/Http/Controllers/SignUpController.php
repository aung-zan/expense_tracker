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


    /**
     * Display the sign up form.
     */
    public function signUpForm()
    {
        return view('authentication.signup');
    }

    /**
     * Store a new user.
     */
    public function signUp(SignUpRequest $request)
    {
        $data = $request->validated();

        $user = $this->userRepository->createUser($data);

        Auth::loginUsingId($user->id);

        return redirect()->route('dashboard');
    }
}
