@extends('admin.layouts.app')

@section('content')
<h4>Progress Log</h4>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Project</th>
            <th>Progress</th>
            <th>User</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @forelse($logs as $log)
        <tr>
            <td>{{ $log->project->title ?? '-' }}</td>
            <td>{{ $log->progress }}</td>
            <td>{{ $log->user->name ?? '-' }}</td>
            <td>{{ $log->created_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">Belum ada progress</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $logs->links() }}
@endsection
