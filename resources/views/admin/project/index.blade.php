@extends('admin.layouts.app')

@section('content')

<div class="page-heading">
    <h3>Data Project</h3>
</div>

<div class="page-content">
    <a href="{{ route('admin.project.create') }}" class="btn btn-primary mb-3">
        + Tambah Project
    </a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Staff</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->categories?->name ?? '-' }}</td>
                        <td>{{ $project->user->name }}</td>
                        <td>
                            <span class="badge bg-success">
                                {{ $project->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('admin.project.destroy', $project->id) }}"
                                method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus data?')" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $projects->links() }}
        </div>
    </div>
</div>

@endsection
