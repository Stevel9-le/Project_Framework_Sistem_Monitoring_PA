@extends('layouts.admin')

@section('content')
<h4>Penilaian PA</h4>
<a href="{{ route('assessments.create') }}" class="btn btn-primary mb-3">Tambah Nilai</a>

<table class="table table-striped">
<tr>
    <th>Project</th>
    <th>Dosen</th>
    <th>Nilai</th>
    <th>Aksi</th>
</tr>
@foreach($assessments as $a)
<tr>
    <td>{{ $a->project->title }}</td>
    <td>{{ $a->lecturer->name }}</td>
    <td>{{ $a->score }}</td>
    <td>
        <a href="{{ route('assessments.edit',$a->id) }}" class="btn btn-warning btn-sm">Edit</a>
    </td>
</tr>
@endforeach
</table>

{{ $assessments->links() }}
@endsection
