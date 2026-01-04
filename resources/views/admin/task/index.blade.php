@extends('layouts.admin')

@section('content')
<h4>Task Saya</h4>

<div class="row">
@foreach($tasks as $task)
<div class="col-md-4">
<div class="card mb-3">
<div class="card-body">
    <h5>{{ $task->title }}</h5>
    <p>{{ $task->project->title }}</p>
    <span class="badge bg-secondary">{{ $task->status }}</span>
</div>
</div>
</div>
@endforeach
</div>

{{ $tasks->links() }}
@endsection
