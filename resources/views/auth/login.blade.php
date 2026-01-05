@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh">
    <div class="card shadow-sm" style="width: 420px;">
        <div class="card-body p-4">

            <div class="text-center mb-4">
                <h4>Login Sistem</h4>
                <p class="text-muted">Sistem Monitoring Proyek / TA</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button class="btn btn-primary w-100 mt-3">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
