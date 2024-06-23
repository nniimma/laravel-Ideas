@extends('layout.layout')
@section('title', 'Login')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6">
                @include('includes.error-message')
                @include('includes.success-message')
                <form class="form mt-5" action="{{ route('login.store') }}" method="post">
                    @csrf
                    <h3 class="text-center">Login</h3>
                    <div class="form-group">
                        <label for="email">Email:</label><br>
                        <input value="{{ old('email') }}" placeholder="example@yahoo.com" type="email" name="email"
                            id="email" class="form-control">
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">Password:</label><br>
                        <input type="password" placeholder="123456" name="password" id="password" class="form-control">
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="remember-me"></label><br>
                        <input type="submit" name="submit" class="btn btn-dark btn-md" value="Login">
                    </div>
                    <div class="text-right mt-2">
                        <a href="{{ route('register') }}">Register here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
