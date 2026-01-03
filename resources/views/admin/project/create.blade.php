@extends('admin.layouts.app')

@section('content')

<div class="page-heading">
    <h3>Tambah Project</h3>
</div>

<div class="page-content">
    <form action="{{ route('admin.project.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Project</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Staff</label>
            <select name="user_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="ongoing">Ongoing</option>
                <option value="done">Done</option>
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>

@endsection
