<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Absensi Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body class="container mt-5">

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-primary bg-light mb-3">
    <a class="navbar-brand" href="#">ABSENSI MAHASISWA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-link active" href="/">Mahasiswa<span class="sr-only">(current)</span></a>
        <a class="nav-link" href="/matkul">Matakuliah</a>
        <a class="nav-link" href="/absen">Absensi</a>
        <a class="nav-link" href="/semester">Semester</a>
        <a class="nav-link" href="/kontrak">Kontrak Matakuliah</a>
        <a class="nav-link" href="/jadwal">Jadwal</a>
        </div>
    </div>
    </nav>

    @yield('content')
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/mahasiswa.js') }}" defer></script>
    <script src="{{ asset('js/matkul.js') }}" defer></script>
    <script src="{{ asset('js/absen.js') }}" defer></script>
    <script src="{{ asset('js/semester.js') }}" defer></script>
    <script src="{{ asset('js/kontrak.js') }}" defer></script>

</body>

</html>