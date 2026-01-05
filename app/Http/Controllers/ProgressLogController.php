<?php

namespace App\Http\Controllers;

use App\Models\ProgressLog;
use App\Models\Project;
use Illuminate\Http\Request;

class ProgressLogController extends Controller
{
    public function index()
    {
        $logs = ProgressLog::with('project')
            ->whereHas('project', function ($q) {
                // Staff hanya lihat progress project miliknya
                if (auth()->user()->hasRole('staff')) {
                    $q->where('user_id', auth()->id());
                }
            })
            ->latest()
            ->paginate(6);

        return view('admin.progress_logs.index', compact('logs'));
    }

    public function create()
    {
        // Staff hanya boleh pilih project miliknya
        $projects = Project::query()
            ->when(auth()->user()->hasRole('staff'), function ($q) {
                $q->where('user_id', auth()->id());
            })
            ->get();

        return view('admin.progress_logs.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id'     => 'required|exists:projects,id',
            'progress_title' => 'required|string|max:255',
            'file'           => 'required|mimes:pdf|max:2048',
            'description'    => 'nullable|string'
        ]);

        $filePath = $request->file('file')->store('progress', 'public');

        ProgressLog::create([
            'project_id'     => $request->project_id,
            'progress_title' => $request->progress_title,
            'description'    => $request->description,
            'file'           => $filePath,
            'progress_date'  => now(),
            'status'         => 'pending'
        ]);

        return redirect()
            ->route('admin.progress-logs.index')
            ->with('success', 'Progress berhasil diupload');
    }

    public function destroy(ProgressLog $progressLog)
    {
        $progressLog->delete();

        return back()->with('success', 'Progress dihapus');
    }
}
