<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Monitoring PA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- BOOTSTRAP --}}
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/bootstrap-icons/bootstrap-icons.css') }}">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #435ebe, #57caeb);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .welcome-card {
            background: #fff;
            border-radius: 12px;
            padding: 40px;
            max-width: 480px;
            width: 100%;
            box-shadow: 0 10px 30px rgba(0,0,0,.15);
            text-align: center;
        }
        .welcome-card img {
            width: 90px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="welcome-card">
    <img src="{{ asset('assets-admin/images/logo/logo.png') }}" alt="Logo">

    <h3 class="mb-2">Sistem Monitoring Proyek Akhir</h3>
    <p class="text-muted mb-4">
        Aplikasi untuk memantau progres Proyek Akhir / Tugas Akhir mahasiswa
    </p>

    <div class="d-grid gap-2">
        <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        @guest
            <a href="{{ route('login') }}" class="btn btn-outline-secondary">
                Login
            </a>
        @endguest
    </div>

    <hr class="my-4">

    <small class="text-muted">
        © {{ date('Y') }} Sistem Monitoring PA
    </small>
</div>

</body>
</html>
