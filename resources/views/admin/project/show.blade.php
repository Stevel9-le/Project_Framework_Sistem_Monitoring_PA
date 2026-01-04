@extends('admin.layouts.app')

@section('content')
<div class="page-heading">
    <div class="row">
        <div class="col-12 col-md-6">
            <h3>Detail Project: {{ $project->name }}</h3>
        </div>
        <div class="col-12 col-md-6 text-end">
            <a href="{{ route('admin.project.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Informasi Project</h4>
                </div>
                <div class="card-body">
                    <p><strong>Kategori:</strong> <span class="badge bg-info">{{ $project->category->name }}</span></p>
                    <p><strong>Staff:</strong> {{ $project->user->name }}</p>
                    <p><strong>Status:</strong> 
                        <span class="badge bg-{{ $project->status == 'done' ? 'success' : 'warning' }}">
                            {{ ucfirst($project->status) }}
                        </span>
                    </p>
                    <hr>
                    @if($project->file_path)
                        <a href="{{ asset('storage/projects/'.$project->file_path) }}" target="_blank" class="btn btn-primary w-100">
                            <i class="bi bi-download"></i> Download File
                        </a>
                    @else
                        <div class="alert alert-light-warning">Tidak ada file lampiran.</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Progress Checklist</h4>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('admin.tasks.store') }}" method="POST" class="mb-4">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" placeholder="Tambah tugas baru..." required>
                            <button class="btn btn-primary" type="submit">+ Tambah</button>
                        </div>
                    </form>

                    <ul class="list-group">
                        @forelse($project->tasks as $task)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <form action="{{ route('admin.tasks.update', $task->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-sm btn-{{ $task->status == 'completed' ? 'success' : 'outline-secondary' }} me-3 rounded-circle" type="submit">
                                        <i class="bi bi-check"></i>
                                    </button>
                                </form>
                                
                                <span class="{{ $task->status == 'completed' ? 'text-decoration-line-through text-muted' : '' }}">
                                    {{ $task->name }}
                                </span>
                            </div>
                            
                            <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus tugas?')" class="btn btn-sm text-danger border-0">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </li>
                        @empty
                        <li class="list-group-item text-center text-muted">Belum ada tugas dibuat.</li>
                        @endforelse
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection