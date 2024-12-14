<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tambahkan CSS atau link ke file CSS di sini -->
</head>
<body>
    <div class="container">
        <h1>Selamat datang, {{ Auth::user()->name }}!</h1>
        <p>Anda berhasil login ke halaman dashboard.</p>

        <p>Informasi Anda:</p>
        <ul>
            <li>Email: {{ Auth::user()->email }}</li>
            <li>Nama: {{ Auth::user()->name }}</li>
            <!-- Anda bisa menambah informasi lain yang dibutuhkan -->
        </ul>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
        
    </div>

    <!-- Tambahkan JavaScript di sini jika diperlukan -->
</body>
</html>
