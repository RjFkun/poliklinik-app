<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dokter Dashboard</title>
</head>
<body>
    <h1>Dokter Dashboard</h1>
    <p>Selamat datang, Dokter!</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
<!-- Moved to resources/views/dashboard_old/dokter.blade.php -->