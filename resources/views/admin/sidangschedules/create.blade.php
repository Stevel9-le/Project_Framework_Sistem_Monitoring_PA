@extends('admin.layouts.app')

@section('content')
<h4>Tambah Jadwal Sidang</h4>

<form method="POST" action="{{ route('admin.sidang-schedules.store') }}">
@csrf
<select name="project_id" class="form-control mb-2">
    @foreach($projects as $project)
        <option value="{{ $project->id }}">{{ $project->title }}</option>
    @endforeach
</select>

<select name="type" class="form-control mb-2">
    <option value="proposal">Proposal</option>
    <option value="hasil">Hasil</option>
    <option value="sidang_akhir">Sidang Akhir</option>
</select>

<input type="datetime-local" name="scheduled_at" class="form-control mb-2">
<input type="text" name="room" class="form-control mb-2" placeholder="Ruangan">

<button class="btn btn-success">Simpan</button>
</form>
@endsection
