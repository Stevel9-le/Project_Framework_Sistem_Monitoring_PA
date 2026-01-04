<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SidangSchedule;
use App\Models\Project;
use Illuminate\Http\Request;

class SidangScheduleController extends Controller
{
    public function index()
    {
        $schedules = SidangSchedule::with('project')
            ->latest()->paginate(10);

        return view('admin.sidang_schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.sidang_schedules.create', [
            'projects' => Project::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required',
            'type' => 'required',
            'scheduled_at' => 'required|date',
        ]);

        SidangSchedule::create($request->all());

        return redirect()->route('sidang-schedules.index')
            ->with('success', 'Jadwal sidang berhasil ditambahkan');
    }

    public function edit(SidangSchedule $sidangSchedule)
    {
        return view('admin.sidang_schedules.edit', compact('sidangSchedule'));
    }

    public function update(Request $request, SidangSchedule $sidangSchedule)
    {
        $sidangSchedule->update($request->all());

        return redirect()->route('sidang-schedules.index')
            ->with('success', 'Jadwal sidang berhasil diupdate');
    }

    public function destroy(SidangSchedule $sidangSchedule)
    {
        $sidangSchedule->delete();

        return redirect()->route('sidang-schedules.index')
            ->with('success', 'Jadwal sidang berhasil dihapus');
    }
}
