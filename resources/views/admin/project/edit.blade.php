@extends('admin.layouts.app')

@section('content')

<div class="page-heading">
    <h3>Edit User</h3>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-body">

                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- NAMA --}}
                        <div class="form-group mb-3">
                            <label>Nama</label>
                            <input 
                                type="text" 
                                name="name" 
                                class="form-control"
                                value="{{ $user->name }}"
                                required
                            >
                        </div>

                        {{-- EMAIL --}}
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input 
                                type="email" 
                                name="email" 
                                class="form-control"
                                value="{{ $user->email }}"
                                required
                            >
                        </div>

                        {{-- ROLE --}}
                        <div class="form-group mb-3">
                            <label>Role</label>
                            <select name="role" class="form-control" required>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
                                <option value="guest" {{ $user->role == 'guest' ? 'selected' : '' }}>Guest</option>
                            </select>
                        </div>

                        {{-- BUTTON --}}
                        <div class="mt-4">
                            <button class="btn btn-primary">Update</button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </section>
</div>

@endsection
