@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Profile Saya</h4>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf

            {{-- FOTO --}}
            <div class="mb-3">
                <label>Foto Profile</label><br>

                <img
                    src="{{ auth()->user()->profile?->photo 
                        ? asset('storage/avatars/'.auth()->user()->profile->photo) 
                        : asset('assets-admin/images/faces/1.jpg') }}"
                    class="rounded-circle mb-2"
                    width="120">

                <input type="file" name="photo" class="form-control">
            </div>

            {{-- PHONE --}}
            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="phone"
                       value="{{ old('phone', auth()->user()->profile->phone ?? '') }}"
                       class="form-control">
            </div>

            {{-- BIO --}}
            <div class="mb-3">
                <label>Bio</label>
                <textarea name="bio" class="form-control"
                          rows="3">{{ old('bio', auth()->user()->profile->bio ?? '') }}</textarea>
            </div>

            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
