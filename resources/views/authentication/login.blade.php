@extends('layouts.auth')

@section('content')
    <!-- Login -->
    <div class="login__block active" id="l-login">
        <div class="login__block__header">
            <h1>Expense Tracker</h1>
            <i class="zmdi zmdi-account-circle"></i>
            Hi there! Please Sign in
        </div>

        @error('auth')
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            {{ $message }}
        @enderror

        <div class="login__block__body">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="email"
                        placeholder="Email Address"
                        value="{{ old('email', '') }}"
                        class="form-control @error('email') is-invalid @enderror"
                    >
                    @error('email')
                        <div class="invalid-feedback text-left">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="password" name="password"
                        placeholder="Password"
                        class="form-control @error('password') is-invalid @enderror"
                    >
                    @error('password')
                        <div class="invalid-feedback text-left">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group text-right">
                    <a href="" class="font-italic">Forgot password?</a>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn--icon-text">
                        <i class="zmdi zmdi-long-arrow-right"></i>
                        Login
                    </button>
                </div>
            </form>

            <div class="form-group">
                <button class="btn btn-light btn--icon-text">
                    <i class="zmdi zmdi-facebook"></i>
                    Login With Facebook
                </button>

                <button class="btn btn-light btn--icon-text">
                    <i class="zmdi zmdi-google"></i>
                    Login With Google
                </button>
            </div>

            <div class="form-group">
                <a href="{{ route('signUpForm') }}">Doesn't have an account? Create New</a>
            </div>
        </div>
    </div>
@endsection