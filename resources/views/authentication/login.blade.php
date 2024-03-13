@extends('layouts.auth')

@section('content')
    <!-- Login -->
    <div class="login__block active" id="l-login">
        <div class="login__block__header">
            <h1>Expense Tracker</h1>
            <i class="zmdi zmdi-account-circle"></i>
            Hi there! Please Sign in
        </div>

        @if (session('auth'))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{ session('auth') }}
            </div>
        @endif

        <div class="login__block__body">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    @php
                        $emailClass = 'form-control';
                        if ($errors->has('email')) {
                            $emailClass = 'form-control is-invalid';
                        }
                    @endphp
                    <input type="text" class="{{ $emailClass }}" name="email" placeholder="Email Address"
                        value="{{ old('email', '') }}">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback text-left">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
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
        </div>
    </div>
@endsection