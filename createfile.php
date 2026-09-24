<?php

$dir = 'resources/views';

// Buat direktori jika belum ada
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
    echo "Direktori {$dir} berhasil dibuat!\n";
}

// === KODE UNTUK LOGIN ===
$loginHtml = <<<HTML
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Manual</title>
</head>
<body>
    <h2>Login ke Sistem</h2>

    @if (\$errors->any())
        <div style="color: red; margin-bottom: 15px;">
            @foreach (\$errors->all() as \$error)
                <div>{{ \$error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div style="margin-bottom: 10px;">
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        
        <div style="margin-bottom: 10px;">
            <label>Password:</label><br>
            <input type="password" name="password" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>
                <input type="checkbox" name="remember" value="1">
                Ingat saya
            </label>
        </div>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>
HTML;

// === KODE UNTUK REGISTER ===
$registerHtml = <<<HTML
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Regis Manual</title>
</head>
<body>
    <h2>Register ke Sistem</h2>

    @if (\$errors->any())
        <div style="color: red; margin-bottom: 15px;">
            @foreach (\$errors->all() as \$error)
                <div>{{ \$error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div style="margin-bottom: 10px;">
            <label>Email:</label><br>
            <input type="email" name="email" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Username:</label><br>
            <input type="text" name="name" required>
        </div>
        
        <div style="margin-bottom: 10px;">
            <label>Password:</label><br>
            <input type="password" name="password" required>
        </div>
        
        <button type="submit">Register</button>
    </form>
</body>
</html>
HTML;

// Proses Pembuatan File
file_put_contents($dir . '/login.blade.php', $loginHtml);
echo "File login.blade.php berhasil dibuat!\n";

file_put_contents($dir . '/register.blade.php', $registerHtml);
echo "File register.blade.php berhasil dibuat!\n";