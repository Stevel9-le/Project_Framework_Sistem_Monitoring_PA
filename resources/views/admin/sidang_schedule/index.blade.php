@extends('layouts.admin')

@section('content')
<h4>Jadwal Sidang</h4>
<a href="{{ route('sidang-schedules.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>

<table class="table table-bordered">
    <tr>
        <th>Project</th>
        <th>Jenis</th>
        <th>Waktu</th>
        <th>Ruangan</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    @foreach($schedules as $item)
    <tr>
        <td>{{ $item->project->title }}</td>
        <td>{{ $item->type }}</td>
        <td>{{ $item->scheduled_at }}</td>
        <td>{{ $item->room }}</td>
        <td>
            <span class="badge bg-info">{{ $item->status }}</span>
        </td>
        <td>
            <a href="{{ route('sidang-schedules.edit',$item->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('sidang-schedules.destroy',$item->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $schedules->links() }}
@endsection
