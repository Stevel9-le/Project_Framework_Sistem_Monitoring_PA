<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Terima Kasih</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .thankyou-container {
            max-width: 700px;
            margin: 80px auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .thankyou-container h2 {
            color: #3E97FF;
            font-weight: bold;
        }

        .email-info {
            color: #555;
            font-style: italic;
        }

        blockquote {
            font-size: 1.1rem;
            margin-top: 20px;
            color: #333;
            background-color: #f8f9fa;
            border-left: 5px solid #3E97FF;
            padding: 15px 20px;
            border-radius: 6px;
        }

        .btn-primary {
            background-color: #3E97FF;
            border: none;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card shadow-sm mx-auto" style="max-width: 400px;">
        <div class="card-body text-center">
            <h4 class="card-title mb-3">Login Berhasil 🎉</h4>
            
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <p>Selamat datang di halaman utama!</p>
            <a href="{{ route('home') }}" class="btn btn-primary w-100">Kembali ke Halaman Home</a>
        </div>
    </div>
</div>

</body>
</html>
