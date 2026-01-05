<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProgressLog;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressLogController extends Controller
{
    public function index()
    {
        $logs = ProgressLog::with('project')
            ->where('user_id', Auth::id())
            ->latest()->paginate(6);

        return view('admin.progress_logs.index', compact('logs'));
    }

    public function create()
    {
        return view('admin.progress_logs.create', [
            'projects' => Project::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required',
            'progress_title' => 'required',
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        $file = $request->file('file')->store('progress','public');

        ProgressLog::create([
            'project_id' => $request->project_id,
            'user_id' => Auth::id(),
            'progress_title' => $request->progress_title,
            'description' => $request->description,
            'file' => $file,
            'progress_date' => now(),
            'status' => 'pending'
        ]);

        return redirect()->route('progress-logs.index')
            ->with('success','Progress berhasil diupload');
    }

    public function destroy(ProgressLog $progressLog)
    {
        $progressLog->delete();

        return back()->with('success','Progress dihapus');
    }
}
