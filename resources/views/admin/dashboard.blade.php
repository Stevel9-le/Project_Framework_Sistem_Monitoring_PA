@extends('admin.layouts.app')

@section('content')

{{-- ============ GUEST ============ --}}
@guest
<div class="d-flex justify-content-center align-items-center" style="min-height: 70vh">
    <div class="card shadow-sm" style="width: 420px;">
        <div class="card-body text-center p-4">

            <div class="avatar avatar-xl mx-auto mb-3">
                {{-- GUEST SELALU FOTO DEFAULT --}}
                <img
                    src="{{ asset('assets-admin/images/faces/1.jpg') }}"
                    class="rounded-circle"
                    width="64"
                    height="64"
                    alt="Guest">
            </div>

            <h4>Selamat Datang</h4>
            <p class="text-muted">Sistem Monitoring Proyek / Tugas Akhir</p>

            <hr>

            <p>
                Anda sedang mengakses <strong>dashboard publik</strong>.
                Silakan login untuk mengelola data.
            </p>

            <a href="{{ route('login') }}" class="btn btn-primary w-100">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </a>

        </div>
    </div>
</div>
@endguest


{{-- ============ USER LOGIN ============ --}}
@auth
<div class="page-heading">
    <h3>Dashboard</h3>
</div>

<div class="page-content">

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="bi bi-briefcase fs-2"></i>
                    <h6>Total Project</h6>
                    <h4>{{ $totalProjects ?? 0 }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="bi bi-hourglass-split fs-2"></i>
                    <h6>Berjalan</h6>
                    <h4>{{ $ongoingProjects ?? 0 }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="bi bi-check-circle fs-2"></i>
                    <h6>Selesai</h6>
                    <h4>{{ $doneProjects ?? 0 }}</h4>
                </div>
            </div>
        </div>

        @role('admin')
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="bi bi-people fs-2"></i>
                    <h6>Total Staff</h6>
                    <h4>{{ $totalStaff ?? 0 }}</h4>
                </div>
            </div>
        </div>
        @endrole
    </div>

    <div class="card">
        <div class="card-body">
            <h4>Selamat Datang, {{ auth()->user()->name }}</h4>

            {{-- FOTO USER LOGIN --}}
            <img
                src="{{ auth()->user()->profile?->photo
                    ? asset('storage/avatars/'.auth()->user()->profile->photo)
                    : asset('assets-admin/images/faces/1.jpg') }}"
                class="rounded-circle mb-3"
                width="80"
                height="80"
                alt="Profile">

            <p>
                Role:
                <strong>{{ auth()->user()->getRoleNames()->first() }}</strong>
            </p>

            @role('admin')
                <a href="{{ route('admin.project.create') }}" class="btn btn-primary">
                    Buat Project Baru
                </a>
            @endrole

            @role('staff')
                <a href="{{ route('admin.project.index') }}" class="btn btn-primary">
                    Lihat Project Saya
                </a>
            @endrole
        </div>
    </div>

</div>
@endauth

@endsection
