@extends('admin.layouts.app')

@section('content')
<div class="page-heading">
    <h3>Edit Project</h3>
</div>

<div class="card">
    <div class="card-body">

        <form action="{{ route('admin.project.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- NAMA PROJECT --}}
            <div class="mb-3">
                <label>Nama Project</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ old('name', $project->name) }}"
                       required>
            </div>

            {{-- KATEGORI --}}
            <div class="mb-3">
                <label>Kategori</label>
                <select name="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $project->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- STAFF --}}
            <div class="mb-3">
                <label>Staff</label>
                <select name="user_id" class="form-control" required>
                    @foreach($users as $staff)
                        <option value="{{ $staff->id }}"
                            {{ $project->user_id == $staff->id ? 'selected' : '' }}>
                            {{ $staff->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- STATUS --}}
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="pending" {{ $project->status == 'pending' ? 'selected' : '' }}>
                        Pending
                    </option>
                    <option value="on_progress" {{ $project->status == 'on_progress' ? 'selected' : '' }}>
                        On Progress
                    </option>
                    <option value="done" {{ $project->status == 'done' ? 'selected' : '' }}>
                        Done
                    </option>
                </select>
            </div>

            <button class="btn btn-primary">Update Project</button>
            <a href="{{ route('admin.project.index') }}" class="btn btn-secondary">Batal</a>

        </form>

    </div>
</div>
@endsection
