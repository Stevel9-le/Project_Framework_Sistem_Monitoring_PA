<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Monitoring Project</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Monitoring PA</a>
            <div class="ms-auto">
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Log in</a>
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="text-center py-5">
            <h1 class="display-5 fw-bold">Monitoring Proyek & Tugas Akhir</h1>
            <p class="lead text-muted">Cari referensi proyek yang sudah selesai atau sedang berjalan.</p>
            
            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <form action="{{ route('home') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control form-control-lg" placeholder="Cari judul project..." value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse($projects as $project)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-secondary">{{ $project->category->name ?? 'Umum' }}</span>
                            <span class="badge bg-{{ $project->status == 'done' ? 'success' : 'warning' }}">
                                {{ ucfirst($project->status) }}
                            </span>
                        </div>
                        <h5 class="card-title">{{ $project->name }}</h5>
                        <p class="card-text text-muted small">
                            Oleh: {{ $project->user->name }}
                        </p>
                        @if($project->file_path)
                            <a href="{{ asset('storage/projects/' . $project->file_path) }}" target="_blank" class="btn btn-sm btn-light w-100 mt-3">
                                <i class="bi bi-download"></i> Download Dokumen
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <img src="{{ asset('assets-admin/images/samples/error-404.png') }}" height="200" alt="Kosong">
                <p class="mt-3">Belum ada data project ditemukan.</p>
            </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center my-4">
            {{ $projects->links() }}
        </div>
    </div>

    <footer class="text-center py-4 text-muted border-top mt-5">
        &copy; 2025 Kelompok Framework - Sistem Monitoring
    </footer>
</body>
</html>