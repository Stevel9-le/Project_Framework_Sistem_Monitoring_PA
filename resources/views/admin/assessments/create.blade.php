@extends('layouts.admin')

@section('content')
<h4>Tambah Penilaian</h4>

<form method="POST" action="{{ route('assessments.store') }}">
@csrf

<select name="project_id" class="form-control mb-2">
@foreach($projects as $p)
<option value="{{ $p->id }}">{{ $p->title }}</option>
@endforeach
</select>

<select name="lecturer_id" class="form-control mb-2">
@foreach($lecturers as $l)
<option value="{{ $l->id }}">{{ $l->name }}</option>
@endforeach
</select>

<input type="number" name="score" class="form-control mb-2" placeholder="Nilai">
<textarea name="notes" class="form-control mb-2" placeholder="Catatan"></textarea>

<button class="btn btn-success">Simpan</button>
</form>
@endsection
