@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
    <h2>Forgot Password</h2>
    <p>Enter your email address and we'll send you a link to reset your password.</p>
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="submit">Send Password Reset Link</button>
        </div>
    </form>
    <p>Remembered your password? <a href="{{ route('login') }}">Login here</a></p>
@endsection
