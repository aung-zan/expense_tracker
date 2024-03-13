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
            <form action="{{ route("signUp") }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name">
                </div>

                <div class="form-group form-group--centered">
                    <input type="text" class="form-control" placeholder="Email Address">
                </div>

                <div class="form-group form-group--centered">
                    <input type="password" class="form-control" placeholder="Password">
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
        </div>
    </div>
@endsection
