@extends('admin.layouts.app')

@section('content')
<div class="page-heading">
    <h3>Manajemen User</h3>
</div>

<a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">
    + Tambah User
</a>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span class="badge bg-info">
                        {{ $user->roles->pluck('name')->implode(', ') }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                        Edit
                    </a>
                </td>
            </tr>
            @endforeach
        </table>

        {{ $users->links() }}
    </div>
</div>
@endsection
