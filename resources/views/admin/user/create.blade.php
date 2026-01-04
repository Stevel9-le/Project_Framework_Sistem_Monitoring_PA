@extends('admin.layouts.app')

@section('content')
<div class="page-heading">
    <h3>Tambah User Baru</h3>
</div>

<div class="page-content">
    <div class="card">
        <div class="card-body">
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" placeholder="Contoh: Budi Santoso">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="email@contoh.com">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Role (Jabatan)</label>
                            <select name="role" class="form-control">
                                <option value="">-- Pilih Role --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-end mt-3">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-light-secondary me-1">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan User</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection