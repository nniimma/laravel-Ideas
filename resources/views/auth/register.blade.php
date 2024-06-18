@extends('layout.layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6">
                @include('includes.error-message')
                @include('includes.success-message')
                <form class="form mt-5" action="{{ route('register') }}" method="post">
                    @csrf
                    <h3 class="text-center">Register</h3>
                    <div class="form-group">
                        <label for="name">Name:</label><br>
                        <input value="{{ old('name') }}" placeholder="Joe" type="text" name="name" id="name"
                            class="form-control mb-3">
                        @error('name')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
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
                    {{-- ! we need to put the name of the password confirm: password_confirmation, in this case we can use the request to validate it: --}}
                    <div class="form-group mt-3">
                        <label for="confirm-password">Confirm Password:</label><br>
                        <input type="password" placeholder="123456" name="password_confirmation" id="confirm-password"
                            class="form-control">
                        @error('password_confirmation')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="remember-me"></label><br>
                        <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
                    </div>
                    <div class="text-right mt-2">
                        <a href="/login">Login here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
