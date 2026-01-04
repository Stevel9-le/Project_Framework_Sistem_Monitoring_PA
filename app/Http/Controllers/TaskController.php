<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('project')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(6);

        return view('staff.tasks.index', compact('tasks'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('staff.tasks.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required',
            'title' => 'required|string|max:255',
            'due_date' => 'required|date',
        ]);

        Task::create([
            'project_id' => $request->project_id,
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => 'pending'
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task berhasil ditambahkan');
    }

    public function edit(Task $task)
    {
        return view('staff.tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->only([
            'title','description','due_date','status'
        ]));

        return redirect()->route('tasks.index')
            ->with('success', 'Task berhasil diupdate');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task berhasil dihapus');
    }
}
