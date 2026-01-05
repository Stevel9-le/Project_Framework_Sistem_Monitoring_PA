@extends('admin.layouts.app')

@section('content')
<h4>Edit Jadwal Sidang</h4>

<form method="POST" action="{{ route('admin.sidang-schedules.update',$sidangSchedule->id) }}">
@csrf @method('PUT')

<input type="datetime-local" name="scheduled_at"
 value="{{ date('Y-m-d\TH:i', strtotime($sidangSchedule->scheduled_at)) }}"
 class="form-control mb-2">

<select name="status" class="form-control mb-2">
    <option value="scheduled">Scheduled</option>
    <option value="completed">Completed</option>
    <option value="cancelled">Cancelled</option>
</select>

<button class="btn btn-success">Update</button>
</form>
@endsection
