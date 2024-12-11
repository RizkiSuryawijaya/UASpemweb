@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h2>Login</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
    <p>Forgot your password? <a href="{{ route('password.request') }}">Reset it here</a></p>
    <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
@endsection
