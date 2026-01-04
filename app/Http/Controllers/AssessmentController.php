<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Project;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index()
    {
        $assessments = Assessment::with('project','lecturer')
            ->latest()->paginate(10);

        return view('admin.assessments.index', compact('assessments'));
    }

    public function create()
    {
        return view('admin.assessments.create', [
            'projects' => Project::all(),
            'lecturers' => Lecturer::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required',
            'lecturer_id' => 'required',
            'score' => 'required|numeric'
        ]);

        Assessment::create($request->all());

        return redirect()->route('assessments.index')
            ->with('success','Penilaian berhasil ditambahkan');
    }

    public function edit(Assessment $assessment)
    {
        return view('admin.assessments.edit', [
            'assessment' => $assessment,
            'projects' => Project::all(),
            'lecturers' => Lecturer::all()
        ]);
    }

    public function update(Request $request, Assessment $assessment)
    {
        $assessment->update($request->all());

        return redirect()->route('assessments.index')
            ->with('success','Penilaian berhasil diupdate');
    }

    public function destroy(Assessment $assessment)
    {
        $assessment->delete();

        return redirect()->route('assessments.index')
            ->with('success','Penilaian berhasil dihapus');
    }
}
