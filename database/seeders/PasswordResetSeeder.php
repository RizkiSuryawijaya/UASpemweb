<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PasswordResetSeeder extends Seeder
{
    public function run()
    {
        // Ambil email dari tabel users (misalnya email pertama)
        $user = User::first(); // Atau sesuaikan dengan query untuk memilih email yang sesuai
        $email = $user ? $user->email : 'user@example.com'; // Fallback jika tidak ada user

        // Generate token
        $token = Str::random(60);

        // Simpan token di tabel password_resets
        DB::table('password_resets')->insert([
            'email' => $email,  // Gunakan email dari tabel users
            'token' => $token,
            'created_at' => now(),
        ]);
    }
}
