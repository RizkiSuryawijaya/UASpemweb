<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat user baru (jika belum ada) atau mengambil user pertama
        $user = User::first();  // Ambil user pertama yang ada di tabel users

        if (!$user) {
            // Jika tidak ada user, buat user baru
            $user = User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => Hash::make('password'),  // Gunakan password yang sesuai dengan Hash::make()
            ]);
        }

        // Generate token untuk password reset
        $token = Str::random(60);

        // Menambahkan entri password reset di tabel password_resets
        DB::table('password_resets')->insert([
            'email' => $user->email,  // Menggunakan email dari user yang ditemukan atau dibuat
            'token' => $token,
            'created_at' => now(),
        ]);

        echo "Password reset entry has been added for {$user->email}\n";
    }
}
