@extends('admin.layouts.app')

@section('content')
<h3>Tambah Task</h3>

<form method="POST" action="{{ route('admin.tasks.store') }}">
@csrf

<select name="project_id" class="form-control mb-2">
    @foreach($projects as $project)
        <option value="{{ $project->id }}">{{ $project->name }}</option>
    @endforeach
</select>

<input type="text" name="title" class="form-control mb-2" placeholder="Judul Task">
<textarea name="description" class="form-control mb-2" placeholder="Deskripsi"></textarea>

<button class="btn btn-primary">Simpan</button>
</form>
@endsection
