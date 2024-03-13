@extends('layouts.auth')

@section('content')
    <!-- Register -->
    <div class="login__block active" id="l-register">
        <div class="login__block__header">
            <h1>Expense Tracker</h1>
            <i class="zmdi zmdi-account-circle"></i>
            Create an account
        </div>

        <div class="login__block__body">
            <form action="{{ route("signUp") }}" method="POST">
                @csrf

                <div class="form-group">
                    @php
                        $nameClass = 'form-control';
                        if ($errors->has('name')) {
                            $nameClass = 'form-control is-invalid';
                        }
                    @endphp
                    <input type="text" class="{{ $nameClass }}" name="name" placeholder="Name">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback text-left">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <div class="form-group form-group--centered">
                    @php
                        $emailClass = 'form-control';
                        if ($errors->has('email')) {
                            $emailClass = 'form-control is-invalid';
                        }
                    @endphp
                    <input type="text" class="{{ $emailClass }}" name="email" placeholder="Email Address">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback text-left">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group form-group--centered">
                    @php
                        $passwordClass = 'form-control';
                        if ($errors->has('password')) {
                            $passwordClass = 'form-control is-invalid';
                        }
                    @endphp
                    <input type="password" class="{{ $passwordClass }}" name="password" placeholder="Password">
                    @if ($errors->has('password'))
                        <div class="invalid-feedback text-left">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Accept the license agreement</span>
                    </label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn--icon-text">
                        <i class="zmdi zmdi-plus"></i>
                        Sign Up
                    </button>
                </div>
            </form>

            <div class="form-group">
                <button class="btn btn-light btn--icon-text">
                    <i class="zmdi zmdi-facebook"></i>
                    Sign Up With Facebook
                </button>

                <button class="btn btn-light btn--icon-text">
                    <i class="zmdi zmdi-google"></i>
                    Sign Up With Google
                </button>
            </div>

            <div class="form-group">
                <a href="{{ route('loginForm') }}">Already have an account? Login</a>
            </div>
        </div>
    </div>
@endsection
