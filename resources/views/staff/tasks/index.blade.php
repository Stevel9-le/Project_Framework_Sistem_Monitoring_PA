@extends('admin.layouts.app')

@section('content')
<div class="page-heading">
    <h3>Task Saya</h3>
</div>

<div class="row">
@forelse($tasks as $task)
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $task->title }}</h5>
                <p class="text-muted">{{ $task->project->name ?? '-' }}</p>
                <span class="badge bg-secondary">{{ $task->status }}</span>
            </div>
        </div>
    </div>
@empty
    <div class="col-12">
        <div class="alert alert-info text-center">
            Belum ada task
        </div>
    </div>
@endforelse
</div>

{{ $tasks->links() }}
@endsection
