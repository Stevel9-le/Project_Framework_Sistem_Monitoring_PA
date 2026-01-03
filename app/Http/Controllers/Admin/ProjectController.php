<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['category', 'user'])->paginate(10);
        return view('admin.project.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::all();
        $users = User::where('role', 'staff')->get();

        return view('admin.project.create', compact('categories', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'status' => 'required'
        ]);

        Project::create($request->all());

        return redirect()->route('admin.project.index')
            ->with('success', 'Project berhasil ditambahkan');
    }

    public function edit(Project $project)
    {
        $categories = Category::all();
        $users = User::where('role', 'staff')->get();

        return view('admin.project.edit', compact('project', 'categories', 'users'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'status' => 'required'
        ]);

        $project->update($request->all());

        return redirect()->route('admin.project.index')
            ->with('success', 'Project berhasil diperbarui');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.project.index')
            ->with('success', 'Project berhasil dihapus');
    }
}

