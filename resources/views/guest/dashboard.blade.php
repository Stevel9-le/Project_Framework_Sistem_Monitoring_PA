@extends('admin.layouts.guest')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height:80vh">
    <div class="card text-center p-4" style="width:420px">
        <img src="{{ asset('assets-admin/images/faces/1.jpg') }}"
             class="rounded-circle mb-3"
             width="100">

        <h4>Dashboard Publik</h4>
        <p class="text-muted">Silakan login untuk mengakses sistem</p>

        <a href="{{ route('login') }}" class="btn btn-primary w-100">
            Login
        </a>
    </div>
</div>
@endsection
