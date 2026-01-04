@extends('admin.layouts.app')

@section('content')
<div class="page-heading">
    <h3>Project Saya (Staff)</h3>
</div>

<div class="page-content">
    <div class="row">
        @foreach($projects as $project)
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">{{ $project->name }}</h4>
                        <p class="card-text">
                            Status: 
                            <span class="badge bg-{{ $project->status == 'done' ? 'success' : 'warning' }}">
                                {{ $project->status }}
                            </span>
                            <br>
                            <small>Kategori: {{ $project->category->name }}</small>
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        @if($project->file_path)
                            <a href="{{ asset('storage/projects/' . $project->file_path) }}" class="btn btn-sm btn-outline-primary" target="_blank">Download File</a>
                        @else
                            <button class="btn btn-sm btn-secondary" disabled>No File</button>
                        @endif

                        <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-sm btn-warning">Update</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="d-flex justify-content-center">
        {{ $projects->links() }}
    </div>
</div>
@endsection