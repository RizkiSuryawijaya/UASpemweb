@extends('layouts.app')

@section('content')
    <h2>Lupa Password</h2>
    <p>Masukkan email Anda untuk menerima tautan reset password atau langsung ubah password Anda.</p>

    {{-- Form untuk mengirim token --}}
    <form method="POST" action="{{ route('password.sendEmail') }}">
        @csrf

        <div>
            <label for="email">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <button type="submit">Kirim Token Reset</button>
    </form>

    <hr>
    <p>Atau langsung ubah password di sini (dengan memasukkan token yang diterima):</p>

    {{-- Form untuk reset password --}}
    <form method="POST" action="{{ route('password.resetPassword') }}">
        @csrf

        <div>
            <label for="email">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="token">Token</label>
            <input id="token" type="text" name="token" value="{{ old('token') }}" required>
        </div>

        <div>
            <label for="password">Password Baru</label>
            <input id="password" type="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <button type="submit">Reset Password</button>
    </form>

    {{-- Tampilkan status atau pesan error --}}
    @if (session('status'))
        <div class="status-message">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error-messages">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
@endsection
